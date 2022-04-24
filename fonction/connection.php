<?php 
	class Modal
	{

		private  $user='root';
		private  $pass='';
		private  $dbname='base';
		private  $host='localhost';
		private  $con;

		function __CONSTRUCT($host=null,$dbname=null,$user=null,$pass=null){
			if($host==null){
				$user=$this->user;
				$pass=$this->pass;
				$dbname=$this->dbname;
				$host=$this->host;
			}
			try{
				$sdn="mysql:host=".$host.";dbname=".$dbname;
				$this->con=new PDO($sdn,$user,$pass);
			}catch(Exception $e){
				die($e->getMessage());
			}
		}

		public function getOne($sql,$param=array())
		{
			$query=$this->con->prepare($sql);
			$query->execute($param);
			return $query->fetch();
		}

		public function getAll($sql,$param=array())
		{
			$query=$this->con->prepare($sql);
			$query->execute($param);
			return $query->fetchAll();
		}
		public function setRecord($sql,$param=array())
		{
			$query=$this->con->prepare($sql);
			if($query->execute($param))
			{
				return true ;
			}
			else
			{
				return false ;
			}
		}
		public function retabPhone($tel)
		{
			$contact = '';
			if(strlen($tel) == 10)
			{
				for ($i=0; $i < strlen($tel) ; $i++) { 
					if($i==2 or $i==4 or $i==7)
					{
						$contact = $contact.$tel[$i].' ';
					}
					else
					{
						$contact = $contact.$tel[$i] ;
					}

				}
			}
			else
			{
				$nbr = 2 ;
				for($i=0; $i < strlen($tel) ; $i++)
				{
					if($i==$nbr or $nbr+3==$i)
					{
						$contact = $contact.$tel[$i].' ';
						$nbr = $i ;
					}
					else
					{
						$contact = $contact.$tel[$i] ;
					}
				}
			}

			return $contact ;
		}
	}

	$modal = new Modal;

?>
