<template>
    <div class="row">
        <div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card text-white bg-info">
						<div class="card-header"><b><i>Instruksi</i></b></div>
						<div class="card-body">
							<li>
	                        	Isi data filter odc sesuai urutan, mulai dari regional, witel, sto, dan odc. Untuk memfilter pencarian odc.
	                        </li>
	                        <li>
								Isi core odc dengan cermat, dengan menklik salah satu port yang ada di panel, dst.
							</li>
						</div>
					</div>
				</div>
			</div>
            <div class="row" style="height: 25px !important"></div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card border-primary">
                        <div class="card-header"><b><i>Data Filter ODC</i></b></div>
                        <div class="card-body">
                            <form @submit.prevent="showOdc">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="regional">Regional</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control form-control-sm" id="regional" name="regional" v-model="regional" @change="allWitel()">
                                                <option :value="0">Pilih Regional</option>
                                                <option :value="regional.id" :key="regional.id" v-for="regional in regionals">{{ regional.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="witel">Witel</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control form-control-sm" id="witel" name="witel" v-model="witel" @change="allSto()">
                                                <option :value="0">Pilih Witel</option>
                                                <option :value="witel.id" :key="witel.id" v-for="witel in witels">{{ witel.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="sto">STO</label>
                                        </div>
                                        <div class="col-md-1" style="text-align: center;">
                                            <label> : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control form-control-sm" id="sto" name="sto" v-model="sto" @change="allOdc()">
                                                <option :value="0">Pilih STO</option>
                                                <option :value="sto.id" :key="sto.id" v-for="sto in stos">{{ sto.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="odc">ODC</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="odc" name="odc" v-model="odc">
												<option :value="0">Pilih ODC</option>
												<option :value="odc.id" :key="odc.id" v-for="odc in odcs">{{ odc.name }}</option>
											</select>
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md" style="text-align: right;">
                                            <button type="submit" class="btn btn-primary btn-sm">Tampilkan ODC &nbsp<i class="far fa-arrow-alt-circle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-7" v-if="loading">
                    <label><i>Menunggu ...</i></label>
                </div>
                <div class="col-md-7" v-if="done">
                    <div class="card border-danger">
                        <div class="card-header" style="text-align:center"><b><i>{{ odcname }}</i></b></div>
                        <div class="card-body">
                            <div class="row" v-for="(panel, indexpanel) in panels" :key="panel.id">
                                <div class="col-md-12">
                                    <div class="row" style="margin-bottom:5px">
                                        <button class="btn btn-sm btn-block btn-secondary">{{ panel.index }} - {{ panel.detail }}</button>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md" v-for="(port, indexport) in panel.ports" :key="port.id">
                                                <button @click="portPopover((indexpanel+1), (indexport+1), port.type, port.data)" class="btn btn-sm btn-primary pop" data-container="body" data-toggle="popover" data-placement="bottom"> {{ (indexport + 1) }} </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="popover_port_empty" class="popover" style="display:none">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-block btn-sm btn-primary"> Inlet </button>
                        </div>
                    </div>
                </div>
                <div id="popover_port_in" class="popover" style="display:none">
                    in
                </div>
                <div id="popover_port_out" class="popover" style="display:none">
                    out
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
                loading: false,
                done: false,
                regionals: [],
				regional: '',
				witels: [],
				witel: '',
				stos: [],
                sto: '',
                odcs: [],
                odc: '',
                odcname: '',
                panels: [],
                distributions: [],
                datadistributions: []
            }
        },
        methods: {
            allRegional() {
				axios.get('/mancorecontentregional')
				.then(
					response => {
						this.regionals = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allWitel() {
				axios.get('/mancorecontentwitel/'+ this.regional)
				.then(
					response => {
						this.witels = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allSto() {
				axios.get('/mancorecontentsto/'+ this.witel)
				.then(
					response => {
						this.stos = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allOdc() {
				axios.get('/mancorecontentodc/'+ this.sto)
				.then(
					response => {
						this.odcs = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
            },
            showOdc() {
                this.loading = true;
                this.done = false;

                this.odcname = $('#odc option:selected').html();
                
                axios.post('/distributioncontentoneodc', {
                    odc_id: this.odc
                })
                .then(
                    response => {
                        this.panels = response.data.data.panelofodc;
                        this.distributions = response.data.data.distDoesntHavePanel;
                        this.datadistributions = response.data.data.alldistributions;

                        this.loading = false;
                        this.done = true;

                        console.log(response.data.data);
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                );
            },
            portPopover(panel, port, type, data) {
                $('.pop').popover({
                    container: 'body',
                    html: true,
                    content: function() {
                        var popover = 'empty';

                        // if(type == 'in'){
                        //     popover = 'in';
                        // }
                        // else {
                        //     popover = 'out';
                        // }

                        return $('#popover_port_'+ popover).html();
                    }
                });
            }
        },
        mounted() {
            console.log('Component mounted.');
			this.allRegional();
        }
    }
</script>
