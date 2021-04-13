window.onload=function(){
        
                    var tab_jours = new Array("Dimanche","Lundi" , "Mardi" , "Mercredi ", "Jeudi" , "Vendredi", " Samedi");
                    var tab_mois = new Array("janvier" , "février" , "mars" , "avril" , "mai" , "juin", "juillet" ,"août ", "septembre", "octobre","novembre ","décembre");
                    var ladate = new Date();    
                    document.getElementById("date").innerHTML= tab_jours[ladate.getDay()]+" "+ ladate.getDate() +" "+tab_mois[ladate.getMonth()]+" "+ ladate.getFullYear();
                                                            
                    document.getElementById("heure").innerHTML= ladate.getHours()+" : "+ladate.getMinutes()+" : "+ladate.getSeconds();
                    lire_date();
                    setInterval("lire_date()",1000);
                };
                function lire_date(){
                    var Minute;
                    var seconde;
                    var heures;
                    var ladate =new Date();
                    if (ladate.getSeconds()<10)
                     seconde = "0"+ladate.getSeconds();
                    else
                     seconde = ladate.getSeconds();
                    if (ladate.getMinutes()<10)
                    Minute = "0"+ladate.getMinutes();
                    else
                     Minute = ladate.getMinutes();
                      if (ladate.getHours()<10)
                    heures = "0"+ladate.getHours();
                    else
                     heures = ladate.getHours();
                    document.getElementById("heure").innerHTML= heures+" : "+Minute+" : "+seconde;
                }
                
               
