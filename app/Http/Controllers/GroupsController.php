<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Product;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        $rootId = Group::ROOT_ID;
        $rootGroups = $groups->filter(function ($item) use ($rootId) {
            return $item->id_parent === $rootId;
        });

        $treeBuilderService = new \App\Services\TreeBuilderService($groups, $rootId);

        $products = collect();
        foreach ($rootGroups as $rootGroup) {
            $groupProducts = Product::all()->whereIn('id_group', array_merge($treeBuilderService->getChildsIds($rootGroup->id), [$rootGroup->id]));
            $rootGroup->products_count = $groupProducts->count();
            $products = $products->merge($groupProducts);
        }

        return view('tasks.task4', ['groups' => $rootGroups, 'products' => $products]);
    }

    public function show(Group $group)
    {
        $groups = Group::all();
        $rootId = Group::ROOT_ID;
        $treeBuilderService = new \App\Services\TreeBuilderService($groups, $rootId);

        $groups = $treeBuilderService->buildTree($rootId, $treeBuilderService->getParentsIds($group->id));
        foreach ($groups as $rootGroup) {
            $rootGroup->products_count = Product::all()->whereIn('id_group', array_merge($treeBuilderService->getChildsIds($rootGroup->id), [$rootGroup->id]))->count();
        }

        $groupProducts = Product::all()->whereIn('id_group', array_merge($treeBuilderService->getChildsIds($group->id), [$group->id]));

        return view('tasks.task4', ['groups' => $groups, 'products' => $groupProducts]);
    }
}
