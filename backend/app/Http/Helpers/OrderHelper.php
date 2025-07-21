<?php

namespace App\Http\Helpers;

use App\Enums\SkillEnum;

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
        $frontendTypeId = SkillEnum::Frontend->value;
        $backendTypeId = SkillEnum::Backend->value;
        $databaseTypeId = SkillEnum::Database->value;
        $devopsTypeId = SkillEnum::DevOps->value;

        $frontendSkills = [];
        $backendSkills = [];
        $databaseSkills = [];
        $devopsSkills = [];

        foreach($skills as $skill){
            if($skill['type'] == $frontendTypeId){
                $frontendSkills[] = $skill->toArray();

            }else if($skill['type'] == $backendTypeId){
                $backendSkills[] = $skill->toArray();

            }else if($skill['type'] == $databaseTypeId){
                $databaseSkills[] = $skill->toArray();

            }else if($skill['type'] == $devopsTypeId){
                $devopsSkills[] = $skill->toArray();
            }
        }

        return array(
            [
                'id' => $frontendTypeId,
                'name' => SkillEnum::Frontend->name,
                'list' => $frontendSkills,
            ],
            [
                'id' => $backendTypeId,
                'name' => SkillEnum::Backend->name,
                'list' => $backendSkills,
            ],
            [
                'id' => $databaseTypeId,
                'name' => SkillEnum::Database->name,
                'list' => $databaseSkills,
            ],
            [
                'id' => $devopsTypeId,
                'name' => SkillEnum::DevOps->name,
                'list' => $devopsSkills,
            ],
        );
    }

}