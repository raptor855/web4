<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>ThE FoRm</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div id="Form">
			<div id="events">
				<p>Please fill out the form</p>
			</div>
			<form method="post" action="index.php" name="contract" >
                <?php
                if (!empty($messages['save'])) {
                    print($messages['save']);
                }
                ?>
				<div id="nam">
                    <?php
                    $ERROR='';
                    $name='';
                    if (!empty($messages['name'])) {
                        print($messages['name']);
                        $ERROR='error';
                    }
                    if(!empty($values['name'])){
                        $name=$values['name'];
                    }
                    ?>
					Name:<input maxlength="25" size="40" name="name" placeholder="First name" class="<?php print $ERROR?>" value="<?php print $name?>">
				</div>
                </br>
				<div id="address">
                    <?php
                    $ERROR='';
                    $email='';
                    if (!empty($messages['email'])) {
                        print($messages['email']);
                        $ERROR='error';
                    }
                    if(!empty($values['email'])){
                        $email=$values['email'];
                    }
                    ?>
					Email:<input name="email" value="<?php print $email?>" class="<?php print $ERROR?>" placeholder="email@yandex.ru">
				</div>
                </br>
				<div id="BIRTHYEAR">
                    <?php
                    $ERROR='';
                    if (!empty($messages['year'])) {
                        print($messages['year']);
                        $ERROR='error';
                    } ?>
                    Year of Birth:
                    <span class="<?php print $ERROR?>">
                        <select name="year" size="1">
                            <?php
                            $select=array(1999=>'',2000=>'',2001=>'',2002=>'',2003=>'');
                            for($s=1999;$s<=2003;$s++){
                                if($values['year']==$s){
                                    $select[$s]='selected';break;
                                }
                            }
                            ?>
                            <option value="">...</option>
                            <option value="1999" <?php print $select[1999]?>>1999</option>
                            <option value="2000" <?php print $select[2000]?>>2000</option>
                            <option value="2001" <?php print $select[2001]?>>2001</option>
                            <option value="2002" <?php print $select[2002]?>>2002</option>
                            <option value="2003" <?php print $select[2003]?>>2003</option>
                        </select>
                    </span>
				</div>
                </br>
				<div id="SEX">
                    <?php
                    $ERROR='';
                    if (!empty($messages['sex'])) {
                        print($messages['sex']);
                        $ERROR='error';
                    }?>
                Sex:    <span class="<?php print $ERROR?>">
                            <input type="radio" value="M" name="sex"<?php if($values['sex']=='M') {print'checked';}?> >Man
                            <input type="radio" value="F" name="sex"<?php if($values['sex']=='F') {print'checked';}?> >Female
                    </span>
                </div>
                </br>
                <div id="LIMBS">
                    <?php
                    $ERROR='';
                    if (!empty($messages['limbs'])) {
                        print($messages['limbs']);
                        $ERROR='error';
                    }
                    ?>
                    Limbs:<?php
                    $select_limbs=array(1=>'',2=>'',2=>'',3=>'',4=>'');
                    for($s=1;$s<=4;$s++){
                        if($values['limbs']==$s){
                            $select_limbs[$s]='checked';break;
                        }
                    }
                    ?>
                    <span class="<?php print $ERROR?>">
                        <input type="radio" value="1" name="limbs" <?php print $select_limbs[1]?>>1
                        <input type="radio" value="2" name="limbs" <?php print $select_limbs[2]?>>2
                        <input type="radio" value="3" name="limbs" <?php print $select_limbs[3]?>>3
                        <input type="radio" value="4" name="limbs" <?php print $select_limbs[4]?>>4
                    </span>
                </div>
                </br>

                <div id="SUPERPOWERS" >
                    <?php
                    $ERROR='';
                    if(!empty($messages['sverh'])){
                        print($messages['sverh']);
                        $ERROR='error';
                    }?>
                    <span >
                        Superpowers:</br>
                        <?php
                         if(!empty($values['sverh'])){
                             $flag=FALSE;
                             $SVERH_PROVERKA = array("net" =>"", "godmod" =>"", "levitation" =>"", "unvisibility" =>"", "telekinesis" =>"", "extrasensory" =>"");
                             $SVERH = unserialize($values['sverh']);
                            if(!empty($SVERH))foreach ($SVERH as $E){
                                if($E=="net"){
                                    $SVERH_PROVERKA["net"]="selected";
                                $flag=TRUE;break;}
                            }
                            if(!empty($SVERH))
                                    if(!$flag){
                                        foreach ($SVERH as $T){
                                            $SVERH_PROVERKA["$T"]="selected";
                                        }
                                    }
                         }
                        ?>
                        <select id="sposobnost" name="sverh[]" multiple="multiple" size="3" class="<?php print $ERROR?>">
                            <option value="net" <?php if(!empty($values['sverh'])) print $SVERH_PROVERKA["net"]?>>None</option>
                            <option value="godmod"<?php if(!empty($values['sverh'])) print $SVERH_PROVERKA["godmod"]?> >GodMode</option>
                            <option value="levitation"<?php if(!empty($values['sverh'])) print $SVERH_PROVERKA["levitation"]?> >Levitation</option>
                            <option value="unvisibility"<?php if(!empty($values['sverh'])) print $SVERH_PROVERKA["unvisibility"]?> >Invisibility</option>
                            <option value="telekinesis"<?php if(!empty($values['sverh'])) print $SVERH_PROVERKA["telekinesis"]?> >Telekinesis</option>
                            <option value="extrasensory"<?php if(!empty($values['sverh'])) print $SVERH_PROVERKA["extrasensory"]?> >Extrasensory</option>
                        </select>
                    </span>
                </div>
                </br>
                    <div id="biography">
                        <?php
                        $ERROR='';
                        if (!empty($messages['biography'])) {
                            print($messages['biography']);
                            $ERROR='error';
                        }
                        ?>
                        <p class="<?php print $ERROR?>" >
                            <textarea cols="45" name="biography" placeholder="Here is your brief biography..."><?php if($values['biography']){print $values['biography'];} ?></textarea>
                        </p>
                    </div>
                </br>
                    <div id="Consent"  >
                    <?php
                    $ERROR='';
                    if (!empty($messages['consent'])) {
                        print($messages['consent']);
                        $ERROR='error';
                    }
                    ?>
                    <span class="<?php print $ERROR?>" >Do you agree that you are selling your soul to the devil?
					    <input type="checkbox" name="consent"  value="yes" <?php if($values['consent']=='yes') {print'checked';}?> >
                    </span>
                </div>
                </br>
				<input type="submit" value="Отправить">
			</form>
		</div>	
	</body>
</html>