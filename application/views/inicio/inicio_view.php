<div class="container">
    <br/>
    <br>
    <div class="row justify-content-center"><h2>Busca la ciudad donde deseas hospedarte!</h2></div> 
    <br>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                       
                            <form class="card card-sm" action="<?=base_url("alojamiento/buscador");?>" method="get">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAARhSURBVGhD1ZpbyGZTGMc/jHNyisjZjNOFQyPcTCZFIYQL05waJHeomZrBpChuRk2GQo6RUrhwmCYulZwPGcwNzTCOQ85R5PT7YdXTau3x7r3X/mb716/eb7/f+6y19l7rOb3vVA8dCBfCtXAHPAD3wRpYBufC3jBKHQw3wDvw5wT8Dq/A1bAvbHO5gPvhFyhNeBJ+hFthL5h2bQdXgZMoTU5+hU3wOrwJm+E3KP2vfAGXwLRpD3gGSpN5F26BU2FHyLUznAG3wUYo2bgbSp+tqv3AO5wP7h0/E9rIpzoP3ofc3jrYDQbRnvAaxAF/hkvBSXXVTqCHy7fdU7ADVJUTfRriQJ/AyVBLZ8N3EMe4HarqGogDfAyHQG2dAHExf8D5UEW62OidfoJTYChdAHGbfQS7Q28ZJ5JRuQyG1s0Qx7wOesmnEYPdG9DnYE8qPdankMb9CnaFzloJyZi0dbF9dAXEsedDZxngkqH3vDCNMihugTS+7riTDoBkRIzYUdvDif+8HEx3QRr/e5gBrWUqHhdyGkSZF5lvDamLIc7hJGgto20yYAKY3w3zrfwp1dbhEBdiStNaFkXJwAdeCHJb+agf/fuv4eQ4MaYshdZ6EJKBt7wQpFv2+tfQad+20LeQ5nGjF9oqBsK3vRB0PKT3TMuHVExZOgVGa+xk4EMvBEWP9qQXBpJP23wrjXU5tJb7MRlwn+4CSabXMeLPgSF0NKQx5DxoLbsd0Ui+hZ6D9N56GKIQWghxDrOgtWzZ2O1IRixPo66EOMgTUDsPewiSfWv+znoVkiEbCXGi1t+enfS+3Au16m2fsC4+2bY/1ln2neJE8y7HRRAPozwP+0NfrYBo1wqys2yexaLKwJjf8ZsgDijeSTPnrgXRPhDjhwlr7227CuIkvVO5lkM8TwkDpvvcnOkgmHTb3QPRTie3m8sOYEyndcXnQK7TwTZonECO29C7uxia7nDuRGw/VcsePBvRuNG2lIk6ubmwGl4EPc2XsAEegSWwtUrvLIjxyddmEVVlBzAu5gfoFKAa5JMwy45j2KirLhtpayEO5LnwsPepp3Uo+U2K2IjQvlu32tPRt5f6vp+BNXabGKItnUT0Tk3Y0Uyv3bKHQW958Ewo8/ghOoU7wfhyBFhPJPm5o8C042HIu4rihJ/NrpWw13UkVJHnQ4OlgRJuvW/+pfR+5AUwSdRh2Cot/U+k6mIMeNeDnqk02CRYtC2C+PTyPK8JveJMqCYP4wKwNtGblQaNmLeZlzX1yYxTpc+VsA/tlq0uz4JtIhsFfvlpeWplZ6vV7TjJHZwNpUk34TcDbstR6iUoTboJW6zHwOh0KPyXM8kxDBwLo5NeyQNdmnQTn8NxMDp5pjzQpUk34WJsWY1O1uptF/M4jFK6WL1TadIlDMKjlS42fgG0NVz0qKWL1TuVJh+xsh29dLEe6NIC5GXo9VXddEoX6+9XSovwxw3/K9nQeAysaTwT/spoiI7nttbU1F8ecld/HmfjEQAAAABJRU5ErkJggg==">
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input id="busqueda" name="localidad" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Ej: Carmen de Patagones">
                                    </div>

                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit" name="submit" value="Buscar">Search</button>
                                    </div>

                                    
                                    <!--end of col-->

                                    

                                    
                                     <script type="text/javascript">


                                            var options = { 
                                            url: function (phrase) { 
                                                // return "api / countrySearch.php? phrase =" + phrase + "& format = json"; 
                                                return "<?php echo base_url();?>inicio/getCiudadesFiltrado/" + phrase; 
                                            }, 

                                                getValue: "nombre" 
                                            }; 

                                         
                                     
                                    // var options = {
                                    //         //url: "<?php echo base_url();?>js/countries.json",
                                    //         url: "<?php echo base_url();?>inicio/getCiudades",
                                            
                                    //         getValue: "nombre"
                                            
                                    //         // template: {
                                    //         //     type: "description",
                                    //         //     fields: {
                                    //         //         description: "id"
                                    //         //     }
                                    //         // }

                                    //         // template: {
                                    //         //     type: "custom",
                                    //         //     method: function(value, item) {
                                    //         //         return item.nombre + "" + item.id;
                                    //         //     }
                                    //         // }
                 
                                            
                                    //     };

                                        $("#busqueda").easyAutocomplete(options);
                                        </script>


                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>