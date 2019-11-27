<?php
                                $files = glob("images/*.*");
                                
                                for ($i=0; $i<count($files); $i++) {
                                    $image = $files[$i];
                                   
                                    echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
                                }
                                
                                ?>