<?php

namespace App\Http\Helpers;


trait OrderHelper {

    public function changeOrders($type = null, $oldOrder = null, $newOrder = null) : void
    {          
        if(!$oldOrder || $oldOrder && $newOrder && $oldOrder > $newOrder){
            $skills = Skill::when($type, function($query) use ($type){
                        $query->where('type',$type);          
                    })
                    ->when($oldOrder, function($query) use ($oldOrder){  
                        $query->where('order','<',$oldOrder);
                    })
                    ->where('order','>=',$newOrder)
                    ->get();
   
            if($skills){
                foreach($skills as $skill){
                    $order = $skill->order;
                    $skill->order = $order + 1;
                    $skill->save();
                } 
            }
         
        }else if(!$newOrder || $oldOrder && $newOrder && $oldOrder < $newOrder){
            $skills = Skill::when($type, function($query) use ($type){
                                $query->where('type',$type);          
                            })
                            ->when($newOrder, function($query) use ($newOrder){
                                $query->where('order','<=',$newOrder);
                            })
                            ->where('order','>',$oldOrder)
                            ->get();
            if($skills){
                foreach($skills as $skill){
                    $order = $skill->order;
                    $skill->order = $order - 1;
                    $skill->save();
                }
            }
        }
    } 

}