<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;
use Model\Managers\TopicManager;

class TopicManager extends Manager
{

    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";


    public function __construct()
    {
        parent::connect();
    }

    public function findTopicById($id)
    {
        $sql = "SELECT *
                    FROM " . $this->tableName . " c
                    WHERE c.categorie_id = :id
                    ORDER BY creationdate DESC";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }

    public function closeTopic($id) {
        $sql = "UPDATE topic
                        SET closed = 1
                        WHERE id_topic = :id";

        return DAO::update($sql, [":id" => $id]);
    }
}