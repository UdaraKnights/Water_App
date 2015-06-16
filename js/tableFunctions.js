function OLtable(id, prefix){ 
    
        var subject = $('#subject'+prefix).val(),
            result = $('#result'+prefix).val();
        var tabelRow = '<tr><td><div contentEditable>'+subject+'</div></td><td><div contentEditable>'+result+'</div></td></tr>'
        $('#'+id+' tbody').append(tabelRow);
}