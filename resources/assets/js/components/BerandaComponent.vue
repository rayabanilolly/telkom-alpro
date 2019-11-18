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
                            <div v-for="gpon in data.gpons">
                                <span class="badge badge-dark">{{ gpon.name }}</span>
                                <li>
                                    <span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">{{ gpon.gpon_planned.length }}</span>
                                </li>
                                <li>
                                    <span class="badge badge-success">In Service</span> : <span class="badge badge-dark">{{ gpon.gpon_inservice.length }}</span>
                                </li>
                            </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md">
	                <div class="card border-danger">
	                    <div class="card-header"><b><i>Data ODC</i></b></div>
	                    <div class="card-body">
	                        <div v-for="odc in data.odcs">
                                <span class="badge badge-dark">{{ odc.name }}</span>
                                <li>
                                    <span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">{{ odc.odc_planned.length }}</span>
                                </li>
                                <li>
                                    <span class="badge badge-success">In Service</span> : <span class="badge badge-dark">{{ odc.odc_inservice.length }}</span>
                                </li>
                            </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md">
	                <div class="card border-success">
	                    <div class="card-header"><b><i>Data ODP</i></b></div>
	                    <div class="card-body">
	                        <div v-for="odp in data.odps">
                                <span class="badge badge-dark">{{ odp.name }}</span>
                                <li>
                                    <span class="badge badge-primary">Planned</span> : <span class="badge badge-dark">{{ odp.odp_planned.length }}</span>
                                </li>
                                <li>
                                    <span class="badge badge-success">In Service</span> : <span class="badge badge-dark">{{ odp.odp_inservice.length }}</span>
                                </li>
                            </div>
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
	                        	Projek : <span class="badge badge-success">{{ data.last_project.name }}</span> <span class="badge badge-warning">{{ data.last_project.type_project.name }}</span> <br> 
	                        	Nomor kontrak : <span class="badge badge-primary">{{ data.last_project.no_contract }}</span> Status : <span class="badge badge-danger">{{ data.last_project.status_project.name }}</span> pada tanggal <span class="badge badge-dark">{{ data.last_project.status_project.created_at }}</span>
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
				kendala: '',
                data: []
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
    		},
            getData() {
                axios.get('/homecontentdata')
                .then(
                    response => {
                        this.data = response.data.data
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
            this.getData();
        }
    }
</script>
