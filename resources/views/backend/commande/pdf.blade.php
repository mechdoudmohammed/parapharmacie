
<!doctype html>
<html class="no-js" lang="">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
  </head>

<body>

<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
@media (min-width: 1200px){
	.container {
    max-width: 1275px !important;
}
}

</style>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Facture  </h2><h3 class="pull-right">N: PCM000{{$commande->id}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
					@php
			$clients=DB::table('clients')->where('id',$commande->client)->first();
		
			@endphp
    				<h4><strong>Facture pour:<br> {{$clients->nom}} {{$clients->prenom}}</strong></h4>
					<strong>{{$clients->tele}}</strong><br>
					<strong>{{$clients->adresse}}</strong><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong></strong><br>
    					

    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong><!--Mode de paiment:--></strong><br>
    				
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong><?php echo"Le:".date("Y/m/d").""; ?></strong><br>

    					<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h5 class="panel-title"><strong>Récapitulatif de la commande</strong></h5>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
				
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Produit</strong></td>
        							<td class="text-center"><strong>Prix</strong></td>
        							<td class="text-center"><strong>Quantite</strong></td>
        							<td class="text-right"><strong>Totale</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    		@php
			$commandes=DB::table('detailcommandes')->where('commande',$commande->id)->get();
			
			@endphp
							@foreach($commandes as $cmd)
    							<tr>
									@php
									$produits=DB::table('produits')->where('id',$cmd->produit)->first();
									@endphp
									<td>{{$produits->nom}}</td>
    								<td class="text-center">{{$produits->prix_vente}}</td>
    								<td class="text-center">{{$cmd->quantite}}</td>
    								<td class="text-right">{{$cmd->prix}} Dhs</td>
    							</tr>


								@endforeach
                                
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Totale HT</strong></td>
    								<td class="thick-line text-right">{{$commande->totale-$commande->totale*0.2}} Dhs</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Tva(20%)</strong></td>
    								<td class="no-line text-right">{{$commande->totale*0.2}} Dhs</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Totale TTC</strong></td>
    								<td class="no-line text-right">{{$commande->totale}} Dhs</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</body>
</html>
