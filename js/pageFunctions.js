function validateFileds(){
        $(".numericFieldNIC1").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 86]) !== -1 ||
                     // Allow: Ctrl+A, Command+A
                    (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
                     // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                         return;
                    }
                
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
            });
            
            $(".numericField1").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .

                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                     // Allow: Ctrl+A, Command+A
                    (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
                     // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                         return;
                }
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
            
            $('.charactorField').bind('keyup blur',function(){
                var node = $(this);
                node.val(node.val().replace(/[^a-z^A-Z^ ]/g,'') );
                });
            
            $('.numericFieldAdvNIC').bind('keyup blur',function(){ 
                var node = $(this);
                node.val(node.val().replace(/[^0-9^v^V]/g,'') ); }
            );
            
            $('.numericFieldAdv').bind('keyup blur',function(){ 
                var node = $(this);
                node.val(node.val().replace(/[^0-9^v]/g,'') ); }
            );
    }