
<?php

    function component($logement,$description,$prixavant,$prixapres,$image,$image2,$periode,$id_a,$id_b,$debutdispo,$findispo,$adresse){

        $element ="
            <div class=\"col-md-3 col-sm-6 my-3 my-md-0 \"> 
                <form action=\"reserve.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$image\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$logement</h5>
                           
                            <div class=\"card-text\">
                                <p>$description</p>
                            </div>
                            <h5>
                                <small><s  class=\"text-secondary\">$$prixavant</s></small>
                                <span class=\"price\">$$prixapres /$periode</span>
                            </h5>
                            <h6>Disponible  le : $debutdispo</h6>
                            <button type=\"submit\"  class=\"btn btn-warning my-3\"name=\"reserve\" >Reserver <i class=\"fas fa-shopping-cart\"></i></button>
                            <input type=\"hidden\" name=\"logement\" value='$logement'>
                            <input type=\"hidden\" name=\"prixavant\" value='$prixavant'>
                            <input type=\"hidden\" name=\"prixapres\" value='$prixapres'>
                            <input type=\"hidden\" name=\"periode\" value='$periode'>
                            <input type=\"hidden\" name=\"debutdispo\" value='$debutdispo'>
                            <input type=\"hidden\" name=\"findispo\" value='$findispo'>
                            <input type=\"hidden\" name=\"image1\" value='$image'>
                            <input type=\"hidden\" name=\"image2\" value='$image2'>
                            <input type=\"hidden\" name=\"description\" value='$description'>
                            <input type=\"hidden\" name=\"id_b\" value='$id_b'>
                            <input type=\"hidden\" name=\"adresse\" value='$adresse'>
                            <input type=\"hidden\" name=\"id_a\" value='$id_a'>
                        </div>
                    </div>
                </form>
            </div>
        ";


        $elements ="
            <div class=\"col-md-3 col-sm-6 my-3 my-md-0 \"> 

                <form action=\"reserve.php\" method=\"post\">
                        <div class=\"card shadow\">
                           <div>
                               <img src=\"$image\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                            </div>
                          <div class=\"card-body\">
                             <h5 class=\"card-title\">$logement</h5>
                           
                            <div class=\"card-text\">
                                <p>$description</p>
                            </div>
                            <h5>
                                <span class=\"price\">$$prixapres /$periode</span>
                            </h5>
                            <h6>Disponible  le : $debutdispo</h6>
                        
                            <button type=\"submit\"  class=\"btn btn-warning my-3\"name=\"reserve\" >Reserver <i class=\"fas fa-shopping-cart\"></i></button>
                            <input type=\"hidden\" name=\"logement\" value='$logement'>
                            <input type=\"hidden\" name=\"prixavant\" value='$prixavant'>
                            <input type=\"hidden\" name=\"prixapres\" value='$prixapres'>
                            <input type=\"hidden\" name=\"periode\" value='$periode'>
                            <input type=\"hidden\" name=\"debutdispo\" value='$debutdispo'>
                            <input type=\"hidden\" name=\"findispo\" value='$findispo'>
                            <input type=\"hidden\" name=\"image1\" value='$image'>
                            <input type=\"hidden\" name=\"image2\" value='$image2'>
                            <input type=\"hidden\" name=\"description\" value='$description'>
                            <input type=\"hidden\" name=\"id_b\" value='$id_b'>
                            <input type=\"hidden\" name=\"adresse\" value='$adresse'>
                            <input type=\"hidden\" name=\"id_a\" value='$id_a'>
                        </div>
                    </div>
                </form>
            </div>
        ";

    if($prixavant==0){echo $elements;}else{
        echo $element; }
    
    }

    function component1($logement,$description,$prixavant,$prixapres,$image,$image2,$periode,$id_a,$id_b,$debutdispo,$findispo,$adresse){
        $element ="
            <div class=\"col-md-3 col-sm-6 my-3 my-md-0 \"> 
                <div class=\"card shadow\">
                    <div>
                        <img src=\"$image\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">$logement</h5>
                      
                        <div class=\"card-text\">
                            <p>$description</p>
                        </div>
                        <h5>
                        
                        <small><s  class=\"text-secondary\">$$prixavant</s></small>
                        <span class=\"price\">$$prixapres /$periode</span>
                    </h5>
                    <h6>Disponible  le : $debutdispo</h6>

                        <form action=\"supprimera.php\" method=\"post\">
                            <button type=\"submit\"  class=\"btn btn-warning my-3\"name=\"reserve\" >Supprimer <i class=\"fa-solid fa-trash-can\"></i></button>
                            <input type=\"hidden\" name=\"logement\" value='$logement'>
                            <input type=\"hidden\" name=\"id_a\" value='$id_a'>
                        </form>

                        <form action=\"annonce_edite.php\" method=\"post\">
                            <input type=\"hidden\" name=\"logement\" value='$logement'>
                            <input type=\"hidden\" name=\"prixavant\" value='$prixavant'>
                            <input type=\"hidden\" name=\"prixapres\" value='$prixapres'>
                            <input type=\"hidden\" name=\"periode\" value='$periode'>
                            <input type=\"hidden\" name=\"debutdispo\" value='$debutdispo'>
                            <input type=\"hidden\" name=\"findispo\" value='$findispo'>
                            <input type=\"hidden\" name=\"image1\" value='$image'>
                            <input type=\"hidden\" name=\"image2\" value='$image2'>
                            <input type=\"hidden\" name=\"description\" value='$description'>
                            <input type=\"hidden\" name=\"id_b\" value='$id_b'>
                            <input type=\"hidden\" name=\"adresse\" value='$adresse'>
                            <input type=\"hidden\" name=\"id_a\" value='$id_a'>
                            <button type=\"submit\"  class=\"btn btn-warning my-3\"name=\"edite\" >Editer <i class=\"fa fa-address-card\"></i></button>
                        </form>
                    </div>
                </div>
            </div>

        ";

        echo $element;
    }

    function component2($logement,$description,$date_reservation,$prixapres,$image,$image2,$periode,$id_a,$id_b,$debutdispo,$findispo,$adresse,$prixavant){
        $element ="
            <div class=\"col-md-3 col-sm-6 my-3 my-md-0 \"> 
                <form action=\"reserve_annule.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$image\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$logement</h5>
                            
                            <div class=\"card-text\">
                                <p>$description</p>
                            </div>
                            <h5>
                                <span class=\"price\">$$prixapres/$periode</span>
                            </h5>

                            
                            <div class=\"card-text\">
                            <p>$date_reservation</p>
                        </div>
                        
                        <button type=\"submit\"  class=\"btn btn-warning my-3\"name=\"reserve\" >Annuler <i class=\"fa-solid fa-square-xmark\"></i></button>
                        <input type=\"hidden\" name=\"logement\" value='$logement'>
                    
                        <input type=\"hidden\" name=\"prixapres\" value='$prixapres'>
                        <input type=\"hidden\" name=\"periode\" value='$periode'>
                        <input type=\"hidden\" name=\"debutdispo\" value='$debutdispo'>
                        <input type=\"hidden\" name=\"findispo\" value='$findispo'>
                        <input type=\"hidden\" name=\"image1\" value='$image'>
                        <input type=\"hidden\" name=\"image2\" value='$image2'>
                        <input type=\"hidden\" name=\"prixavant\" value='$prixavant'>
                        <input type=\"hidden\" name=\"description\" value='$description'>
                        <input type=\"hidden\" name=\"id_b\" value='$id_b'>
                        <input type=\"hidden\" name=\"adresse\" value='$adresse'>
                        <input type=\"hidden\" name=\"id_a\" value='$id_a'>
                        </div>
                    </div>
                </form>
            </div>
        ";
    
        echo $element;
    }