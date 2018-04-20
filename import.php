<?php
//import.php
sleep(3);
$output = '';

if(isset($_FILES['file']['name']) &&  $_FILES['file']['name'] != ''){
    
 $valid_extension = array('xml');
 $file_data = explode('.', $_FILES['file']['name']);
 $file_extension = end($file_data);
 if(in_array($file_extension, $valid_extension))
     
 {
  $data = simplexml_load_file($_FILES['file']['tmp_name']);
  $connect = new PDO('mysql:host=localhost;dbname=xmlm','root', null);
  $query = "INSERT INTO dadoscliente (name, phone, fax, website, address, email, age) VALUES(:name, :phone, :fax, :website, :address, :email, :age);";
     
  $statement = $connect->prepare($query);
  for($i = 0; $i < count($data); $i++)
  {
   $statement->execute(
    array(
     ':name'     => $data->pessoa[$i]->name,
     ':phone'    => $data->pessoa[$i]->phone,
     ':fax'      => $data->pessoa[$i]->fax,
     ':website'  => $data->pessoa[$i]->website,
     ':address'  => $data->pessoa[$i]->address,
     ':email'    => $data->pessoa[$i]->email,    
     ':age'      => $data->pessoa[$i]->age
    )
   );

  }
  $result = $statement->fetchAll();
  if(isset($result)){
      
   $output = '<div class="alert alert-success">Arquivo importado com sucesso!</div>';
      
  }
 }else{
     
  $output = '<div class="alert alert-danger">Arquivo Inválido</div>';
     
 }
}else{
    
 $output = '<div class="alert alert-warning">Selecione um Arquivo XML. Por Favor!</div>';
    
}
echo $output;

?>
