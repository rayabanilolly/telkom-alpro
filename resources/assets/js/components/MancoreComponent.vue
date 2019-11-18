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
                        <div class="card-header" style="text-align:center">
                            <b><i>{{ odcname }}</i></b>
                            <button @click="modal=true" id="splitter-btn" class="btn btn-sm btn-primary position-absolute">Data Splitter</button>
                        </div>
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
                                                <!-- <button @click="portPopover((indexpanel+1), (indexport+1), port.type, port.data)" class="btn btn-sm btn-primary pop" data-container="body" data-toggle="popover" data-placement="bottom"> {{ (indexport + 1) }} </button> -->
                                                <button @click="showModalPanel(indexpanel, indexport, port.data)" :class="port.data !== null ? port.data.type === 'in' ? 'btn-warning' : 'btn-success' : ''" class="btn btn-sm btn-primary pop" data-container="body" data-toggle="popover" data-placement="bottom"> {{ (indexport + 1) }} </button>
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

        <stack-modal
            :show="modal"
            title="Data Splitter"
            @close="modal=false"
        >
            <button class="btn btn-info btn-sm" @click="createModal=true">Tambah Splitter</button>

            <v-client-table :columns="columns" :data="splitters" :options="options">
                <span slot="opsi" slot-scope="{row}">
                    <div class="button-group">
                        <button class="btn btn-primary btn-sm" v-on:click="splitterEdit(row)">
                            Edit <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" v-on:click="splitterDelete(row.id)">
                            Hapus <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </span>
            </v-client-table>
        </stack-modal>

        <stack-modal
            :show="createModal"
            title="Tambah Data Splitter"
            @close="createModal=false"
        >
            <form @submit.prevent="saveSplitter()">
                <div class="form-group">
                    <label for="splitter-name">Nama Splitter</label>
                    <input type="text" class="form-control" v-model="splitter.name" id="splitter-name" placeholder="Nama Splitter">
                </div>
                <div class="form-group">
                    <label for="splitter-port">Port</label>
                    <select id="splitter-port" v-model="splitter.port" class="form-control">
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                    </select>
                </div> 

                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                </div>
            </form>
        </stack-modal>

        <stack-modal
            :show="portPanelModal"
            title="Data Port"
            @close="portPanelModal=false"
        >
            <form @submit.prevent="savePortPanel()">
                <div class="form-group">
                    <label for="port-type">Tipe Port</label>

                    <select v-model="portDataForm.type" class="form-control form-control-sm">
                        <option :value="'in'">In</option>
                        <option :value="'out'">Out</option>
                    </select>
                </div>

                <div v-if="portDataForm.type === 'out'" class="form-group">
                    <label for="splitter-name">Kabel</label>
                    <div class="row">
                        <div class="col-6">
                            <select v-model="portDataForm.distribution" @change="getOdp()" class="form-control form-control-sm">
                                <option :value="distribution.id" v-for="distribution in distributions">{{ distribution.name }}</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="number" v-model="portDataForm.distribution_core" placeholder="Core Kabel" class="form-control form-control-sm">
                        </div>    
                    </div>
                </div>                

                <div v-if="portDataForm.type === 'in'" class="form-group">
                    <label for="gpon">Gpon</label>

                    <div class="row">
                        <div class="col-12">
                            <select v-model="portDataForm.gpon" class="form-control form-control-sm">
                                <option :value="gpon.id" v-for="gpon in gpons">{{ gpon.name }}</option>
                            </select>  
                        </div>

                        <div class="col-6 mt-3">
                            <input type="text" v-model="portDataForm.gpon_slot" placeholder="slot" class="form-control form-control-sm">
                        </div>

                        <div class="col-6 mt-3">
                            <input type="text" v-model="portDataForm.gpon_port" placeholder="port" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="splitter-name">Nama Splitter</label>
                    <div class="row">
                        <div class="col-6">
                            <select v-model="portDataForm.splitter" class="form-control form-control-sm">
                                <option :value="splitter.id" v-for="splitter in splitters">{{ splitter.name }}</option>
                            </select>
                        </div>

                        <div v-if="portDataForm.type === 'out'" class="col-6">
                            <input type="number" v-model="portDataForm.splitter_port" placeholder="Splitter Port" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>

                <div v-if="portDataForm.type === 'out'" class="form-group">
                    <label for="odp-name">Nama ODP</label>
                    <select class="form-control form-control-sm" v-model="portDataForm.odp">
                        <option v-for="odp in odps" :value="odp.id">{{ odp.name }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                    <button class="btn btn-danger btn-sm" type="button" v-if="portDataForm.id != null" @click="deletePort(portDataForm.id)">Hapus</button>
                </div>
            </form>
        </stack-modal>
    </div>
</template>

<script>
    
    import axios from 'axios';
    import StackModal from '@innologica/vue-stackable-modal'

    export default {
        data() {
            return {
                loading: false,
                done: false,                
                splitter: {},
                splitters: [],
                modal: false,
                createModal: false,
                portPanelModal: false,
                modalTitle: 'Data Splitter',
                regionals: [],
				regional: '',
				witels: [],
				witel: '',
				stos: [],
                sto: '',
                odcs: [],
                odc: '',
                odcname: '',
                odps: [],
                gpons: [],
                panels: [],
                portData: {},
                portDataForm: {
                    type: 'in'
                },
                distributions: [],
                datadistributions: [],
                columns: ['name', 'port', 'opsi'],
                options: {
                    headings: {
                        'name': 'Nama',
                        'port': 'Jumlah Port',
                        'opsi': 'Aksi'
                    },
                    sortable: ['name', 'port'],
                    filterable: ['name'],
                    pagination: {
                        chunk:10, dropdown: false
                    }
                }
            }
        },
        methods: {
            showModalPanel(panelindex, portindex, data)
            {
                this.portDataForm = {}
                this.portDataForm.type = 'in'

                if (data !== null) {

                    this.portDataForm.id                = data.id
                    this.portDataForm.odc               = data.odc_id
                    this.portDataForm.odp               = data.odp_id
                    this.portDataForm.distribution      = data.distribution_id
                    this.portDataForm.splitter          = data.splitter_id
                    this.portDataForm.gpon              = data.gpon_id
                    this.portDataForm.splitter_port     = data.splitter_port
                    this.portDataForm.distribution_core = data.distribution_core
                    this.portDataForm.gpon_slot         = data.gpon_slot
                    this.portDataForm.gpon_port         = data.gpon_port
                    this.portDataForm.type              = data.type 
                    this.portDataForm.portIndex         = data.port
                    this.portDataForm.panelIndex        = data.panel
                }
                else {

                    this.portDataForm.portIndex = portindex
                    this.portDataForm.panelIndex = panelindex
                }
                
                this.portPanelModal = true
            },
            deletePort(id)
            {

                if (confirm('yakin mau dihapus?')) {

                    this.loading = true

                    axios.get(`/port-delete/${id}`)
                    .then(
                        response => {

                            this.showOdc()
                            this.portPanelModal = false
                            this.loading = false
                        }
                    )
                    .catch(
                        (error) => console.log(error.message)
                    );
                }
            },
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
                this.splitter.odc_id = this.odc

                this.odcname = $('#odc option:selected').html();
                
                axios.post('/distributioncontentoneodc', {
                    odc_id: this.odc
                })
                .then(
                    response => {
                        this.panels = response.data.data.panelofodc;
                        this.distributions = response.data.data.distDoesntHavePanel;
                        this.datadistributions = response.data.data.alldistributions;

                        this.getSplitter()
                        this.getGpon()

                        this.loading = false;
                        this.done = true;
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

                        return $('#popover_port_'+ popover).html();
                    }
                });
            },
            savePortPanel()
            {
                this.loading = true
                this.portDataForm.odc = this.odc

                axios.post('odcsaveportdata', this.portDataForm)
                .then(
                    response => {

                        this.showOdc()

                        this.loading = false
                        this.portPanelModal = false

                        this.portDataForm = {}

                        alert('Data berhasil ditambah')

                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            },
            getOdp()
            {
                this.loading = true

                axios.get(`/odp-get/${this.odc}/${this.portDataForm.distribution}`)
                .then(
                    response => {

                        this.odps = response.data.data
                        this.loading = false
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            },
            getGpon() {

                this.loading = true

                axios.get(`/gpon-get/${this.sto}`)
                .then(
                    response => {
                        this.gpons = response.data.data
                        this.loading = false
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            },
            // getDistribusi(){
            //     this.loading = true

            //     axios.get(`/distribution-get/`)
            //     .then(
            //         response => {
            //             this.distributions = response.data.data
            //             this.loading = false
            //         }
            //     )
            //     .catch(
            //         (error) => console.log(error.message)
            //     )
            // },
            getSplitter()
            {
                this.loading = true

                axios.get(`splitter-get/${ this.odc }`)
                .then(
                    response => {
                        this.loading = false

                        this.splitters = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            },
            saveSplitter()
            {
                this.loading = true

                axios.post(`/splitter-save`, this.splitter)
                .then(
                    response => {
                        this.loading = false

                        this.splitter.name = ''
                        this.splitter.port = ''
                        this.createModal = false

                        this.getSplitter();

                        return alert('Berhasil!')
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            },
            splitterEdit(row) 
            {
                this.splitter.id     = row.id
                this.splitter.name   = row.name
                this.splitter.port   = row.port
                this.splitter.odc_id = row.odc_id

                this.createModal = true
            },
            splitterDelete(id)
            {
                if (confirm('yakin mau menghapus data?')) {

                    this.loading = true

                    axios.get(`splitter-delete/${id}`)
                    .then(
                        response => {
                            this.getSplitter();
                            this.loading = false

                            return alert('Splitter berhasil dihapus!')
                        }
                    )
                    .catch(
                        (error) => console.log(error.message)
                    )
                }
            }
        },
        mounted() {
            console.log('Component mounted.');

			this.allRegional();
        }
    }
</script>

<style>
    #splitter-btn {
        right: 1em;
    }

    .modal-footer {
        display: none;
    }
</style>