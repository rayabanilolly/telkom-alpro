<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card text-white bg-info">
						<div class="card-header"><b><i>Instruksi</i></b></div>
						<div class="card-body">
							<li>
	                        	Isi data monitoring projek sesuai urutan, mulai dari regional, witel, sto. Untuk memfilter pencarian data monitoring projek.
	                        </li>
	                        <li>
								Di setiap data projek terdapat detail alpro apa saja yang dibangun pada setiap projeknya.
							</li>
	                        <li>
	                        	Jika mengubah status projek menjadi <i><b>Close</b></i>, maka akan mengubah setiap alpro di dalam projek tersebut menjadi <i><b>Golive</b></i>.
	                        </li>
	                        <li>
	                        	Jika ingin mengubah beberapa alpro saja yang menjadi <i><b>Golive</b></i>, maka harus melalui menu <i><b>Alpro</b></i> kemudian pilih <i><b>ODC</b></i> atau <i><b>ODP</b></i>, kemudian ubah status alpro tersebut sesuai status seharusnya.
	                        </li>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="height: 25px !important"></div>
			<div class="row">
				<div class="col-md-7">
					<div class="card border-primary">
						<div class="card-header"><b><i>Data Monitoring Projek</i></b></div>
						<div class="card-body">
							<form @submit.prevent="allProjek">
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="regional">Regional</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="regional" name="regional" v-model="regional" v-on:change="allWitel()">
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
											<select class="form-control form-control-sm" id="witel" name="witel" v-model="witel" v-on:change="allSto()">
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
											<select class="form-control form-control-sm" id="sto" name="sto" v-model="sto">
												<option :value="0">Pilih STO</option>
												<option :value="sto.id" :key="sto.id" v-for="sto in stos">{{ sto.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md" style="text-align: right;">
											<button type="submit" class="btn btn-primary btn-sm">Tampilkan Projek &nbsp<i class="far fa-arrow-alt-circle-down"></i></button>
										</div>
									</div>
								</div>
							</form>
							<div v-if="loading">
								<label><i>Menunggu ...</i></label>
							</div>
							<div v-if="done">
								<div class="row">
									<div class="col-md-12">
										<v-client-table 
                                            :columns="columns" 
                                            :data="projects" 
                                            :options="options">
                                            <span slot="opsi" slot-scope="{row}">
                                                <div class="button-group">
                                                    <button class="btn btn-primary btn-sm" v-on:click="editData(row)">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" v-on:click="deleteData(row.id)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </span>    
                                        </v-client-table>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div v-if="edited === true" class="col-md-5">
                    <div class="card border-primary">
                        <div class="card-header">
                            <b><i>Ubah Status</i></b>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="submitEdit()">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="status">Nama Projek</label>
                                        </div>
                                        <div class="col-md-1"> : </div>
                                        <div class="col-md-8">
                                            <input type="text" disabled class="form-control form-control-sm" v-model="project.name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="status">Status</label>
                                        </div>
                                        <div class="col-md-1"> : </div>
                                        <div class="col-md-8">
                                            <select class="form-control form-control-sm" v-model="project.statusproj_id">
                                                <option :value="status.id" :key="status.id" v-for="status in statuss">
                                                    {{ status.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-9 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</template>

<script>
import axion from 'axios';
	export default {
		data() {
			return {
				loading: false,
                edited: false,
				done: false,
				regionals: [],
				regional: '',
				witels: [],
				witel: '',
				stos: [],
				sto: '',
				projects: [],
                statuss: [],
				project: '',
				columns: ['name', 'no_contract', 'mitra.name', 'odpcount', 'status_project.name', 'created_at', 'opsi'],
				small: true,
				options: {
					headings: {
						name: 'Projek',
						no_contract: 'Kontrak',
						'mitra.name' : 'Mitra',
						odpcount: 'Jumlah ODP',
						'status_project.name': 'Status',
						created_at: 'Dibuat pada',
                        opsi: 'Aksi'
					},
					sortable: ['name', 'no_contract', 'mitra', 'status_project.name', 'created_at']
				}
			}
		},
		methods: {
			allRegional() {
				axios.get('/monitoringcontentregional')
				.then(
					response => {
						this.regionals = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
            editData(data) {
                this.edited = true
                this.project = data
            },
            submitEdit() {
                
                this.loading = true
                axios.post(`monitoringcontentprojectedit/`, this.project)
                .then( 
                    response => {
                        alert('status berhasil diubah!');

                        this.allProjek();
                        this.edited = false
                        this.loading = false
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            },
            deleteData(id) {
                if (confirm('yakin mau dihapus?')) {
                    this.loading = true

                    axios.get(`monitoringcontentprojectdelete/${id}`)
                    .then(
                        response => {
                            alert('data berhasil dihapus?');
                            this.allProjek();
                            this.loading = false;
                        }
                    )
                    .catch( 
                        (error) => console.log(error.message)
                    )
                }
            },
			allWitel() {
				axios.get('/monitoringcontentwitel/'+ this.regional)
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
				axios.get('/monitoringcontentsto/'+ this.witel)
				.then(
					response => {
						this.stos = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
            allProjek() {
                this.loading = true,
                axios.get(`/monitoringcontentproject/${this.regional}/${this.witel}/${this.sto}`)
                    .then(
                    response => {
                        this.projects = response.data.data
                        this.loading = false
                        this.done = true
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            },
            getStatuss() {
                axios.get(`/status-project-get/`)
                .then(
                    response => {
                        this.statuss = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            }
		},
		mounted() {
			console.log('Component mounted.');
            this.getStatuss();
			this.allRegional();
		}
	}
</script>