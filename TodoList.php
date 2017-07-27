<?php



namespace GreekTodoList;



class TodoList
{
    private $taskLists;

    public function __construct()
    {
        $this->taskLists = [];
    }

    public static function create()
    {
        return new static();
    }

    public function addTaskList(TaskList $list)
    {
        $this->taskLists[] = $list;
        return $this;
    }

    public function getNbTotalDays($ignoreDoneDays=false)
    {
        $n = 0;
        foreach ($this->taskLists as $list) {
            /**
             * @var $list TaskList
             *
             */
            $n += $list->getNbTotalDays($ignoreDoneDays);
        }
        return $n;
    }

    /**
     * @return TaskList[]
     */
    public function getTaskLists()
    {
        return $this->taskLists;
    }
}
