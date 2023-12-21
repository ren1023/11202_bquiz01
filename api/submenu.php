<?php include_once "db.php";
if(isset($_POST['id'])){  //當有 id欄位時，就執行以下
        foreach($_POST['id'] as $idx => $id){
            if(isset($_POST['del']) && in_array($id,$_POST['id'])){
                $Menu->del($id);
            }else{
                $row=$Menu->find($id);
                $row['text']=$_POST['text'][$idx];
                $row['href']=$_POST['href'][$idx];
                $Menu->save($row);
            }
    }
}
if(isset($_POST['add_text'])){
    foreach($_POST['add_text'] as $idx => $text){
        if($text!=''){
            $data=[];
            $data['text']=$text;
            $data['href']=$_POST['add_href'][$idx];
            $data['sh']=1;
            $data['menu_id']=$_POST['menu_id'];
            $Menu->save($data);

        }

    }
}
to("../back.php?do=menu");
?>