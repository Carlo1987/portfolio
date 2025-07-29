<?php

namespace App\Http\Helpers;

use App\Enums\SkillEnum;
use App\Enums\TextEnum;

trait OrderHelper {

    public function changeOrders($model, $type = null, $oldOrder = null, $newOrder = null) : void
    {          
        if(!$oldOrder || $oldOrder && $newOrder && $oldOrder > $newOrder){
            $items = $model::when($type, function($query) use ($type){
                        $query->where('type',$type);          
                    })
                    ->when($oldOrder, function($query) use ($oldOrder){  
                        $query->where('order','<',$oldOrder);
                    })
                    ->where('order','>=',$newOrder)
                    ->get();
   
            if($items){
                foreach($items as $item){
                    $order = $item->order;
                    $item->order = $order + 1;
                    $item->save();
                } 
            }
         
        }else if(!$newOrder || $oldOrder && $newOrder && $oldOrder < $newOrder){
            $items = $model::when($type, function($query) use ($type){
                                $query->where('type',$type);          
                            })
                            ->when($newOrder, function($query) use ($newOrder){
                                $query->where('order','<=',$newOrder);
                            })
                            ->where('order','>',$oldOrder)
                            ->get();
            if($items){
                foreach($items as $item){
                    $order = $item->order;
                    $item->order = $order - 1;
                    $item->save();
                }
            }
        }
    } 


    public function skillsGrouppedByType($skills)
    {
        $data = array(
            SkillEnum::Frontend->value => [
                'name' => SkillEnum::Frontend->output(),
                'list' => [],
            ],
            SkillEnum::Backend->value => [
                'name' => SkillEnum::Backend->output(),
                'list' => [],
            ],
            SkillEnum::Database->value => [
                'name' => SkillEnum::Database->output(),
                'list' => [],
            ],
            SkillEnum::DevOps->value => [
                'name' => SkillEnum::DevOps->output(),
                'list' => [],
            ],
        );
        return $this->groupItemsByType($skills, $data);
    }

    public function textsGrouppedByType($texts)
    {
        $data = array(
            TextEnum::curriculumPresentacion->value => [
                'name' => TextEnum::curriculumPresentacion->output(),
                'list' => [],
            ],
            TextEnum::curriculumSignature->value => [
                'name' => TextEnum::curriculumSignature->output(),
                'list' => [],
            ],
            TextEnum::portfolioHome->value => [
                'name' => TextEnum::portfolioHome->output(),
                'list' => [],
            ],
            TextEnum::portfolioAboutMe->value => [
                'name' => TextEnum::portfolioAboutMe->output(),
                'list' => [],
            ],
        );
        return $this->groupItemsByType($texts, $data);
    }

    private function groupItemsByType($items, $data)
    {
        $itemsGroupped = $data;
        foreach ($items as $item) {
            $type = $item['type']; 
            if(array_key_exists($type, $itemsGroupped)) {
                $itemsGroupped[$type]['list'][] = $item->toArray(); 
            }
        }
        return $itemsGroupped;
    }

}