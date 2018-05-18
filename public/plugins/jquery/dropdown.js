$("#Nivel").change(function(event)
{
  if(event.target.value){
  $.get("/admin/alumnos/create/"+event.target.value+"", function(response, nivel){
    console.log(event.target.value);
    $("#grado_id").empty();
    for(i=0;i<response.length;i++){
    $("#grado_id").append("<option value="+response[i].id+">"+response[i].grado+" "+response[i].nombre+"</option>");}
  });
  }
  else {
    $.get("/admin/alumnos/create2/"+0+"", function(response, nivel){
      console.log(response);
      $("#grado_id").empty();
      for(i=0;i<response.length;i++){
      $("#grado_id").append("<option value="+response[i].id+">"+response[i].grado+" "+response[i].nombre+"</option>");}
    });
    }
});
