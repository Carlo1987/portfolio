<?php

namespace App\Http\Helpers;


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

}