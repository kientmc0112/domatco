<?php
   //Định nghĩa lớp trừu tượng động vật có vú
   abstract class Mammal{
       //Định nghĩa các phương thức chung của lớp Mamal
      abstract public function setAge($age);
      abstract public function getAge();
      public function eat($food){
        echo "Bạn muốn ăn gì?";
      }
   }

   class Person extends Mammal {
      protected $job_;
      public function setAge($age){
        $this->age_ = $age;
      }

      public function getAge(){
        return $this->age_;
      }

      public function eat($food){
        echo 'Tôi muốn ăn chay ngày hôm nay';
      }

      public function setJob($job){
         $this->job_ = $job;
      }
      public function getJob(){
         echo 'Công việc của tôi là '.$this->job_;
      }
    }
    $abc = new Person();
    echo $abc->eat("pig");
?>