<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('id', 'desc')->get();
        $skillsTypes = $this->groupByType($skills);
   
        return view('admin.pages.skills.index', [
            'skillsTypes' => $skillsTypes
        ]);
    }

    private function groupByType($skills)
    {
        $skillTypes =  config('setting.skillTypes');
        $frontendTypeId = $skillTypes['frontend']['id'];
        $backendTypeId = $skillTypes['backend']['id'];
        $databaseTypeId = $skillTypes['database']['id'];
        $devopsTypeId = $skillTypes['devops']['id'];

        $frontendSkills = [];
        $backendSkills = [];
        $databaseSkills = [];
        $devopsSkills = [];

        foreach($skills as $skill){
            if($skill['skillType'] == $frontendTypeId){
                $frontendSkills[] = $skill->toArray();

            }else if($skill['skillType'] == $backendTypeId){
                $backendSkills[] = $skill->toArray();

            }else if($skill['skillType'] == $databaseTypeId){
                $databaseSkills[] = $skill->toArray();

            }else if($skill['skillType'] == $devopsTypeId){
                $devopsSkills[] = $skill->toArray();
            }
        }

        return array(
            [
                'id' => $frontendTypeId,
                'name' => $skillTypes['frontend']['name'],
                'list' => $frontendSkills,
            ],
            [
                'id' => $backendTypeId,
                'name' => $skillTypes['backend']['name'],
                'list' => $backendSkills,
            ],
            [
                'id' => $databaseTypeId,
                'name' => $skillTypes['database']['name'],
                'list' => $databaseSkills,
            ],
            [
                'id' => $devopsTypeId,
                'name' => $skillTypes['devops']['name'],
                'list' => $devopsSkills,
            ],
        );
    }


    public function store(Request $request, $id = null)
    {
        $request->validate([
            'skillType' => 'required',
            'name' => 'required|string',
            'order' => 'required|integer',
            'image' =>  'required|mimes:jpeg,jpg,png,gif,webp',
        ],
        [
          'name.required' => 'Nome obbligatorio',
          'order.required' => 'Numero ordine obbligatorio',
          'image.required' => 'Immagine obbligatoria',
          'image.mimes' => 'Formato file non valido',  
        ]);

        $skill;
        $oldOrder = null;
        $newOrder = $request->order;
        if($id){
            $skill = Skill::find($id);
            $oldOrder = $skill->order;
        }else{
            $skill =  new Skill();
        }
       
        $this->changeOrders(
            $skill->skillsTypes, 
            $oldOrder, 
            $newOrder
        ); 

        $skill->skillType = $request->skillType;
        $skill->name = $request->name;
        $skill->order = $newOrder;
        $skill->save();
    }


    private function changeOrders($skillType, $oldOrder, $newOrder) : void
    {
        if($oldOrder == null || $oldOrder && $oldOrder > $newOrder){
            /* $skills = Skill::where('skillType',$skillType)
                            ->where('order','>=',$newOrder)
                            ->where('order','<',$oldOrder)
                            ->get(); */

            $skills = Skill::when($oldOrder, function($query) use ($oldOrder){
                        $query->where('order','<',$oldOrder);
                    })
                    ->where('skillType',$skillType)
                    ->where('order','>=',$newOrder)
                    ->get();

            if($skills){
                foreach($skills as $skill){
                    $order = $skill->order;
                    $skill->order = $order + 1;
                    $skill->save();
                } 
            }
         
        }else{
            $skills = Skill::where('skillType',$skillType)
                            ->where('order','<=',$newOrder)
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
