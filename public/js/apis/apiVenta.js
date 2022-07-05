function init(){
    //RUTA DE LA API QUE SE USARA 
    var apiProd='http://localhost/jobon/public/apiProductos'
    var apiVenta='http://localhost/jobon/public/apiVentas'
new Vue({
    // SE LE ASIGNA EL TOKEN
	 http: {
        headers: {
           'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },

    el:'#apiVenta',
    data: {
        mensaje:'Que onda raza haremos el pinshe punto de venta aqui',
        sku:'',
        nombre:'',
        ventas:[],
        productos:[],
        cantidades:[1,1,1,1,1,1,1,1,1,1],
        cant:1,
        pagaraCon:null,
        folio:'',
        schProd:true,



    },

    created:function(){
      this.foliar();  
      this.getProd();
    },

    methods: {

        getProd:function(){
            this.$http.get(apiProd).then(function(json){
                this.productos=json.data;
            });
        },

        buscarProd:function(){
            var encontrado=0;
            if(this.sku)
            {
                var producto={};
            }

            //busqueda
            for(var i=0; i < this.ventas.lenght; i++){
                if(this.sku===this.ventas[i].sku){
                    encontrado=1;
                    this.ventas[i].cantidad++;
                    this.cantidad[i]++;
                    this.sku='';
                    break;
                }
                
            }

            //fin de la busqueda

            //Inicio del GET de AJAX 
            if(encontrado===0)
            this.$http.get(apiProd + '/' + this.sku).then(function(json){
                producto = {
                    sku:json.data.sku,
                    nombre:json.data.nombre,
                    precio_publico:json.data.precio_publico,
                    cantidad:1,
                    total:json.data.total,
                };

                this.ventas.push(producto);
                this.cantidades.push(1);
                this.sku='';
            });
        },

        showModal:function(){
            this.schProd=false;
            this.nombre="";
            $('#modalCobro').modal('show');
        },

        foliar:function(){
            this.folio="VNT-" + moment().format('YYMMDDhmmss');
        },

        vender:function(){
            var unaVenta={};
            var deta=[];

            //se prepara el JSON de los detalles
            for(var i=0; i<this.ventas.lenght; i++){
                deta.push(
                    {sku:this.ventas[i].sku,
						folio:this.folio,
						cantidad:this.ventas[i].cantidad,
						precio:this.ventas[i].precio_publico,
						total:this.ventas[i].total
                }
                );
            }
            //fin del json de los detalles
            unaVenta={
                folio:this.folio,
                fecha_venta:moment().format('YYYY-MM-DD'),
                num_articulos:this.numArticulos,
                total:this.granTotal,
                detalles:deta
            };

            this.$http.post(apiVenta,unaVenta).then(function(json){
                console.log(json);
                $('#modalCobro').modal('hide');
                this.foliar();
                this.ventas=[];
                this.cantidades=[1,1,1,1,1,1,1,1,1,1];
                this.pagaraCon='';
            });

        },

        encontrar:function(){
            this.schProd=true;
            this.nombre='';
            $('#modalCobro').modal('show');
                
        },

        addEncontrado:function(id){
			this.sku=id;
			if(this.sku){
	
			var producto = {};

            this.$http.get(apiProd + '/' + this.sku).then(function(json){
                producto = {
                    sku:json.data.sku,
                    nombre:json.data.nombre,
                    precio_publico:json.data.precio_publico,
                    cantidad:1,
                    total:json.data.total,
                };

                this.ventas.push(producto);
                this.cantidades.push(1);
                this.sku='';
                
            });

        }

        },

        aniadirProducto:function(id){
			var encontrado=0;
			this.sku=id;

			if(this.sku){//INICIO DE IF(THIS.SKU)
	
			var producto = {};

			//Rutina de busqueda

			if (encontrado===0)
			
			this.$http.get(apiProd + '/' +this.sku).then(function(j){
				console.log(j.data);

				producto = {
					sku:j.data.sku,
					nombre:j.data.nombre,
					precio_publico:j.data.precio_publico,
					cantidad:1, 
					total:j.data.precio,
					
				};

	
					this.ventas.push(producto);
					this.cantidades.push(1);
				this.sku='';
			});
		    }

		},//fin aniadir producto

        
    },
    //FIN DE LOS METHODS
    computed:{
        totalProductos(){
            return(id)=>{
                var total=0;
                if(this.cantidades[id]!=null)
                total=this.ventas[id].precio_publico*this.cantidades[id];
                //se actualiza el total de cada uno de los productos 
                this.ventas[id].total=total;
                //se actualiza la cantidad en el array de ventas 
                this.ventas[id].cantidad=this.cantidades[id];
                return total.toFixed(1);
            }
        },

        granTotal(){
            var total=0;

            for (var i = this.ventas.length - 1; i >= 0; i--) {
                total=total+this.ventas[i].total;
            }
            
            
 			return total.toFixed(1);
        },

        numArticulos(){
            var art=0;
 			for (var i = this.ventas.length - 1; i >= 0; i--) {
 				art=art+this.ventas[i].cantidad;
 			}

 			return art;
        },

        cambio(){
            var camb=0;
            camb=this.pagaraCon - this.granTotal;
            camb=camb.toFixed(1);
            return camb;
        },

        searchProd(){
            return this.productos.filter((producto)=>{
                return producto.nombre.toLowerCase().match(this.nombre.toLowerCase().trim())
            });
        },

    },
}) 


} window.onload = init;    