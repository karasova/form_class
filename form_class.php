<?php
class Form {
    private $lastname;
    private $name;
    private $email;
    private $phone;
    private $theme;
    private $pay;
    private $check;
    public $date;
    private $ipaddr;
    private $status;

    public $errors = array();

    private function check_and_fill(){        

        if (empty($_POST['check'])){
            $this->check = 'off';
        }
        else 
            $this->check = $_POST['check'];

        if (!empty($_POST['lastname'])){
            $this->lastname = $_POST['lastname'];
            $this->lastname = str_replace("|", "", $this->lastname);
        }
        else 
            $this->errors ['lastname'] = 'Не заполнено поле с фамилией!';

        if (!empty($_POST['firstname'])){
            $this->firstname = $_POST['firstname'];
            $this->firstname = str_replace("|", "", $this->firstname);
        }
        else 
            $this->errors ['firstname'] = 'Не заполнено поле с именем!';

        if (!empty($_POST['email'])){
            $this->email = $_POST['email'];
            $this->email = str_replace("|", "", $this->email);
        }
        else 
            $this->errors ['email'] = 'Не введен адрес электронной почты!'; 
        if (!empty($_POST['phone'])){
            $this->phone = $_POST['phone'];
            $this->phone = str_replace("|", "", $this->phone);
        }
        else 
            $this->errors ['phone'] = 'Не введен номер телефона!';  
        
        $this->theme = $_POST['theme'];
        $this->pay = $_POST['pay'];
        

        $this->date = date('Y-m-d-H-i-s');
        $this->ipaddr = $_SERVER['REMOTE_ADDR'];
        $this->status = 'active';

    }

    public function form_fill() {
        $filename = 'data.txt'; 

        $this->check_and_fill();

        if (empty($errors)){
            $contents = $this->lastname . " | " . $this->firstname . " | " . $this->email . " | " . $this->phone . " | " . $this->theme . " | " . $this->pay . " | " . $this->check . " | ". $this->date . " | ". $this->ipaddr ." | ". $this->status . "\n";
            file_put_contents('form_str/data.txt', $contents, FILE_APPEND);  
            //header('Location: form_str\success.php');
            exit;    
        }   
        
    } 

    public function read_content($i){
        $files = file_get_contents("data.txt");
		$files = explode("\n", trim($files));
		if (!isset($files[$i]))
			return false;
		$str = explode("|", trim($files[$i]));
		$j = 0;
		foreach (['name', 'lastname', 'email', 'phone', 'theme', 'pay', 'check', 'date', 'ipaddr', 'status'] as $key) {
			$this->$key = $str[$j];
			$j++;
		}
		return true;
    }

    public function save_to_file()
	{
		$this->ipaddr = $_SERVER['REMOTE_ADDR'];
		if (empty($this->statusDel))
			$this->statusDel = "active";
		$contents = $this->name."|".$this->lastname."|".$this->email."|".$this->phone."|".$this->theme."|".$this->pay."|".$this->check."|".$this->date."|".$this->ipaddr."|".$this->status."\n";
		
		file_put_contents("data.txt", $contents, FILE_APPEND);
	}
}
?>