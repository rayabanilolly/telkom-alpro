<template>	
	<div class="row">
	    <div class="col-md-6">
	        <div class="row">
	            <div class="col-md">
	                <div class="card text-white bg-info">
	                    <div class="card-header"><b><i>Data Projek</i></b></div>
	                    <div class="card-body">
	                        <li>
	                        	Total projek yang <span class="badge badge-light">telah terdata</span> : <span class="badge badge-dark">{{ all }}</span> projek
	                        </li>
	                        <li>
	                        	Total projek yang <span class="badge badge-secondary">sedang dibangun</span> : <span class="badge badge-dark">{{ pembangunan }}</span> projek
	                        </li>
	                        <li>
	                        	Total projek yang <span class="badge badge-primary">sedang dalam proses inventori</span> : <span class="badge badge-dark">{{ inventory }}</span> projek
	                        </li>
	                        <li>
	                        	Total projek yang <span class="badge badge-success">sudah close</span> : <span class="badge badge-dark">{{ close }}</span> projek
	                        </li>
	                        <li>
	                        	Total projek yang <span class="badge badge-danger">masuk kendala existing dan duplikasi olt</span> : <span class="badge badge-dark">{{ kendala }}</span> projek
	                        </li>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="row" style="height: 25px !important"></div>
	        <div class="row">
	            <div class="col-md">
	                <div class="card border-primary">
	                    <div class="card-header"><b><i>Data GPON</i></b></div>
	                    <div class="card-body">
	                        <span class="badge badge-dark">SMRSEM</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">00000</span>
	                        </li>
	                        <span class="badge badge-dark">SMRTSN</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRPAA</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRLMP</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRPLL</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRLOB</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRSGK</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRSBR</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRTMD</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRSMR</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">TRGTGG</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">TRGSAN</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">TRGAGN</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">MLKMLA</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">MBDMBD</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SAASTT</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">BOGLKT</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">BOGBOT</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md">
	                <div class="card border-danger">
	                    <div class="card-header"><b><i>Data ODC</i></b></div>
	                    <div class="card-body">
	                        <span class="badge badge-dark">SMRSEM</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">00000</span>
	                        </li>
	                        <span class="badge badge-dark">SMRTSN</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRPAA</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRLMP</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRPLL</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRLOB</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRSGK</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRSBR</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRTMD</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRSMR</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">TRGTGG</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">TRGSAN</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">TRGAGN</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">MLKMLA</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">MBDMBD</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SAASTT</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">BOGLKT</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">BOGBOT</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md">
	                <div class="card border-success">
	                    <div class="card-header"><b><i>Data ODP</i></b></div>
	                    <div class="card-body">
	                        <span class="badge badge-dark">SMRSEM</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">00000</span>
	                        </li>
	                        <span class="badge badge-dark">SMRTSN</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRPAA</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRLMP</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRPLL</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRLOB</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRSGK</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRSBR</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRTMD</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SMRSMR</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">TRGTGG</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">TRGSAN</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">TRGAGN</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">MLKMLA</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">MBDMBD</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">SAASTT</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">BOGLKT</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <span class="badge badge-dark">BOGBOT</span>
	                        <li>
	                        	<span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                        <li>
	                        	<span class="badge badge-success">In Service</span> : <span class="badge badge-dark">0</span>
	                        </li>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-6">
	        <div class="row">
	            <div class="col-md">
	                <div class="card border-dark">
	                    <div class="card-header"><b><i>Terbaru</i></b></div>
	                    <div class="card-body text-dark">
	                        <li>
	                        	Projek : <span class="badge badge-success">ABD-FTTH-SC-7421831-PT TKM (ODP-SBR-FAG 050-051)</span> <span class="badge badge-warning">MIGRASI</span> <br> 
	                        	Nomor kontrak : <span class="badge badge-primary">KTEL.006901/HK.810/R6W-6F100000/2017</span> Status : <span class="badge badge-danger">Projek baru</span> pada tanggal <span class="badge badge-dark">2018-09-10 20:55:43</span>
	                        </li>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
import axios from 'axios';
    export default {
    	data() {
    		return {
				all: '',
				pembangunan: '',
				inventory: '',
				close: '',
				kendala: ''
			}
    	},
    	methods: {
    		getProject() {
    			axios.get('/homecontentproject')
    			.then(
    				response => {
    					this.all = response.data.data.all,
    					this.pembangunan = response.data.data.pembangunan,
    					this.inventory = response.data.data.inventory,
    					this.close = response.data.data.close,
    					this.kendala = response.data.data.kendala
    				},
				)
				.catch(
					(error) => console.log(error)
				);
    		}
    	},
        mounted() {
            console.log('Component mounted.');
            this.getProject();
        }
    }
</script>
