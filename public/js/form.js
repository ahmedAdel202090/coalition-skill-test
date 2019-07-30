function submit(self){
    var form=$(self).serializeArray()
    $.ajax({
        url:'/submit',
        type:'POST',
        data:$(self).serialize(),
        success:function(){
            var row='<tr>';
            for(var i=0;i<form.length;i++)
            {
                var element=form[i];
                if(element.name=='_token')
                {
                    continue;
                }
                row+='<td>'+element.value+'</td>';
            }
            row+='</tr>';
            $('tbody').append(row);
        }
    });
}

$('#form-product').submit(function(e){
    e.preventDefault();
    submit(this)
});

