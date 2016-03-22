			$(document).on("ready", function(){
			    $("#showAll").click(function () {
			        loadAll();
			    });
			    $("#show").click(function () {
			        load();
			    });
			});	
			
			var loadAll = function(){
				$.ajax({
					type:"POST",
					url:"core.php"
				}).done(function(data){
					var record = JSON.parse(data);
					$("#content").html("");
					for (var i in record) {				    
					    $("#content").append("<div><center><h1>" + record[i].name + "</h1><h3>" + record[i].writer + "</h3>" + record[i].url + "</center><p>" + record[i].text + "</p></div>");
					}
				});
			}

			var load = function () {
			    var a;
			    a = $('#category').val();
			    $.ajax({
			        type: "POST",
			        data: ({"value": a}),
			        url: "core.php"			      
			    }).done(function (data) {
			        var record = JSON.parse(data);
			        $("#content").html("");
			        var i;
			        i = $(record).length;
			        i = parseInt((Math.random() * i * 500)%i);
			        $("#content").append("<div><center><h1>" + record[i].name + "</h1><h3>" + record[i].writer + "</h3>" + record[i].url + "</center><p>" + record[i].text + "</p></div>");
			    });
			}


