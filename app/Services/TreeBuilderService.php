<?php

namespace App\Services;

use Illuminate\Support\Collection;

class TreeBuilderService
{
    public $data;
    public $rootId;

    /**
     * TreeBuilderService constructor.
     * @param Collection $data
     * @param int $rootId
     */
    public function __construct(Collection $data, $rootId = 0)
    {
        $this->data = $data->keyBy('id');
        $this->rootId = $rootId;
    }

    /**
     * @param $parentId
     * @param array $parentIds
     * @return array
     */
    public function buildTree($parentId, $parentIds = [])
    {
        $tree = [];

        foreach ($this->data as $item) {
            if ($item['id_parent'] == $parentId) {
                $tree[$item['id']] = $item;

                if (in_array($item['id'], $parentIds)) {
                    if ($children = $this->buildTree($item['id'], $parentIds)) {
                        $tree[$item['id']]['children'] = $children;
                    }
                }
            }
        }

        return $tree;
    }

    /**
     * @param $id
     * @return array
     */
    public function getParentsIds($id)
    {
        $result[] = $id;

        if ($this->data[$id]->id_parent !== $this->rootId) {
            $result = array_merge($result, $this->getParentsIds($this->data[$id]->id_parent));
        } else {
            $result[] = $this->rootId;
        }

        return $result;
    }

    /**
     * @param $id
     * @return array
     */
    public function getChildsIds($id)
    {
        $result = [];
        foreach ($this->data as $child) {
            if ($child->id_parent == $id) {
                $result[] = $child->id;
                $result= array_merge($result, $this->getChildsIds($child->id));
            }
        }

        return $result;
    }
}
