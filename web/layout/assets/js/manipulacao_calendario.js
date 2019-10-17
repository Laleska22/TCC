$(".vanilla-calendar-date").click(function(){
  limparTabela()
  dataPassar=$(this).attr("data-calendar-date");
   let Mes= dataPassar.slice(4,7)
                    switch(Mes){
                      case 'Jan':
                        Mes= "01"
                        break;
                      case 'Feb':
                        Mes= "02" 
                        break;
                      case 'Mar':
                        Mes= "03" 
                        break;
                      case 'Apr':
                        Mes= "04"
                        break;
                      case 'May':
                        Mes= "05"
                        break;
                      case 'Jun':
                        Mes= "06"
                        break;
                      case 'Jul':
                        Mes= "07"
                        break;
                      case 'Aug':
                        Mes= "08"
                        break;
                      case 'Sep':
                        Mes= "09"
                        break;
                      case 'Oct':
                        Mes= "10"
                        break;
                      case 'Nov':
                        Mes= "11"
                        break;
                      case 'Dec':
                        Mes= "12"
                        break;
                    }
                  let dia= dataPassar.slice(8,10)
                  let ano =dataPassar.slice(11,15)
                  let dataBusca= ano+'-'+Mes+'-'+dia
                  console.log(dataBusca)
   $.get('index.php?r=atendente/buscar',{data :dataBusca},function(data){
      var data=$.parseJSON(data)
      data.forEach(consulta =>{
        $("#consultas").append(`<tr> 
        <td>${consulta.Hora_Consulta}</td>
        <td>${consulta.Nome}</td>
        <td>${consulta.Especialidade}</td>
        <td>${consulta.Nome_Medico}</td>
        </tr>`)
      })
       
    })
})

function limparTabela(){
  $('#consultas').empty();
}