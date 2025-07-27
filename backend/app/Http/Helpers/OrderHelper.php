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
            $frontendTypeId => [
                                    'name' => SkillEnum::Frontend->name,
                                    'list' => $frontendSkills,
                                ],
            $backendTypeId =>  [
                                    'name' => SkillEnum::Backend->name,
                                    'list' => $backendSkills,
                                ],
            $databaseTypeId => [
                                    'name' => SkillEnum::Database->name,
                                    'list' => $databaseSkills,
                                ],
            $devopsTypeId =>   [
                                    'name' => SkillEnum::DevOps->name,
                                    'list' => $devopsSkills,
                                ],
        );
    }


    public function textsGrouppedByType($texts)
    {
        $curriculumPresentacionID = TextEnum::curriculumPresentacion->value;
        $curriculumSignatureId = TextEnum::curriculumSignature->value;
        $portfolioHomeId = TextEnum::portfolioHome->value;
        $portfolioAboutMeId = TextEnum::portfolioAboutMe->value;

        $curriculumPresentacionTexts = [];
        $curriculumSignatureTexts = [];
        $portfolioHomeTexts = [];
        $portfolioAboutMeTexts = [];

        foreach($texts as $text){
            if($text->type == $curriculumPresentacionID){
                $curriculumPresentacionTexts[] = $text->getTextsAllLanguages();
            }
            if($text->type == $curriculumSignatureId){
                $curriculumSignatureTexts[] = $text->getTextsAllLanguages();;
            }
            if($text->type == $portfolioHomeId){
                $portfolioHomeTexts[] = $text->getTextsAllLanguages();;
            }
            if($text->type == $portfolioAboutMeId){
                $portfolioAboutMeTexts[] = $text->getTextsAllLanguages();;
            }
        }

        return array(
            $curriculumPresentacionID => $curriculumPresentacionTexts,
            $curriculumSignatureId => $curriculumSignatureTexts,
            $portfolioHomeId => $portfolioHomeTexts,
            $portfolioAboutMeId => $portfolioAboutMeTexts,
        );
        
    }

}