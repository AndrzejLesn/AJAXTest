			$(document).on("ready", function(){
			    $("#showAll").click(function () {
			        loadAll();
			    });
			    $("#show").click(function () {
			        load();
			    });
			    $("#add").click(function () {
			        window.location = 'add.php';
			    });
			});	
			
			var loadAll = function(){
				$.ajax({
					type:"POST",
					url:"show.php"
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
			        url: "show.php"			      
			    }).done(function (data) {
			        var record = JSON.parse(data);
			        $("#content").html("");
			        var i;
			        i = $(record).length;
			        i = parseInt((Math.random() * i * 500)%i);
			        $("#content").append("<div><center><h1>" + record[i].name + "</h1><h3>" + record[i].writer + "</h3>" + record[i].url + "</center><p>" + record[i].text + "</p></div>");
			    });
			}

