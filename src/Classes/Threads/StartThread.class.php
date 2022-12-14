<?php


namespace Threads;

    use \parallel\runtime;

    class StartThread extends CreateThread{
        private int $id;
        private array $proceses;
        private string $process_id;

        public function __construct($threads, $return)
        {   
            $stamp = '[NOTIFICATION]['.strtoupper(date('D, d M Y H:i:s')).'] ';
            $this->proceses = array();

            foreach($threads as $job=>$file) {

                a:
                $this->id = rand(0 , 256);
    
                $this->process_id = "thread_".$this->id;
    
                if (in_array($this->process_id, $this->proceses)) {
                    goto a;
                } else {
                    $this->proceses[$this->process_id] = array($job => $file);

                    if($return == true) {
                        print($stamp."Created ".$this->process_id." with job: ". $job."\n");
                    }
                }
            }
        }


        public function startThreadTask() {
            $stamp = '[SERVER]['.strtoupper(date('D, d M Y H:i:s')).'] ';
            printf($stamp." Starting threads..\n");
            $future_id = 1;
            foreach ($this->proceses as $task => $job) {
                ${$task} = new Runtime();
                foreach ($job as $key => $value) {
                    $stamp = '[NOTIFICATION]['.strtoupper(date('D, d M Y H:i:s')).'] ';
                    
                    printf($stamp."Started ". $task .":".$key." with future future_".$future_id.PHP_EOL);
                    
                    $agv = array($value, __ROOT__);
                    ${'future_'.$future_id} = ${$task}->run(function($path, $root){
                        $stamp_error = '[ERROR]['.strtoupper(date('D, d M Y H:i:s')).'] ';
                        if (file_exists($path)) {
                            include_once $root.'fileSystem.php';
                            include_once __INCLUDES__.'AutoLoader.inc.php';
                            include_once $path;
                        } else {
                            printf($stamp_error."Could not start the thread... File does not exist in ". $path."\n Exiting thread... \n");
                            exit();
                        }
                    },$agv);
                    $future_id++;
                }
            }
        }
    }


?>