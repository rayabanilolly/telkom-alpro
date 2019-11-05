<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card text-white bg-info">
						<div class="card-header"><b><i>Instruksi</i></b></div>
						<div class="card-body">
							<li>
	                        	Isi data odc sesuai urutan, mulai dari regional, witel, sto, dst. Untuk memfilter pencarian data odc.
	                        </li>
	                        <li>
								Isi form odc dengan cermat, mulai dari nama, spesifikasi, mitra, dst.
							</li>
	                        <li>
	                        	Jika ingin menambah odc baru harus mengisi data odc terlebih dahulu, kemudian form odc.
	                        </li>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="height: 25px !important"></div>
			<div class="row">
				<div class="col-md-7">
					<div class="card border-primary">
						<div class="card-header"><b><i>Data Odc</i></b></div>
						<div class="card-body">
							<form @submit.prevent="allOdc">
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
											<button type="submit" class="btn btn-primary btn-sm">Tampilkan Odc &nbsp<i class="far fa-arrow-alt-circle-down"></i></button>
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
										<v-client-table :columns="columns" :data="odcs" :options="options">
											<span slot="opsi" slot-scope="{row}">
												<button class="btn btn-secondary btn-sm" v-on:click="formodcshow = true; typeform = 'edit'; showOdc(row.id)">EDIT <i class="fas fa-edit"></i></button>
											</span>
										</v-client-table>		
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5" v-show="formodcshow">
					<div class="card border-danger">
						<div class="card-header"><b><i>Form Odc</i></b></div>
						<div class="card-body">
							<!-- <form> -->
								<input type="hidden" id="typeform" name="typeform" v-model="typeform">
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="odc">Nama Odc</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control form-control-sm" placeholder="Nama Odc" name="name" id="name" v-model="name">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="odcspec">Spesifikasi</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<select class="form-control form-control-sm" id="odcspec" name="odcspec" v-model="odcspec">
												<option :value="0">Pilih Spesifikasi</option>
												<option :value="odcspec.id" :key="odcspec.id" v-for="odcspec in odcspecs">{{ odcspec.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="odf">Projek</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control form-control-sm" placeholder="Nama Projek" name="projek" id="projek" v-model="projek">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="typeproject">Tipe Projek</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<select class="form-control form-control-sm" id="typeproject" name="typeproject" v-model="typeproject">
												<option :value="0">Pilih Tipe</option>
												<option :value="typeproject.id" :key="typeproject.id" v-for="typeproject in typeprojects">{{ typeproject.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="mitra">Mitra</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<select class="form-control form-control-sm" id="mitra" name="mitra" v-model="mitra">
												<option :value="0">Pilih Mitra</option>
												<option :value="mitra.id" :key="mitra.id" v-for="mitra in mitras">{{ mitra.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="statuscons">S. Pembangunan</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<select class="form-control form-control-sm" id="statuscons" name="statuscons" v-model="statuscons">
												<option :value="0">Pilih Status</option>
												<option :value="statuscons.id" :key="statuscons.id" v-for="statuscons in statusconss">{{ statuscons.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="statusinv">S. Inventori</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<select class="form-control form-control-sm" id="statusinv" name="statusinv" v-model="statusinv" v-on:change="">
												<option :value="0">Pilih Mitra</option>
												<option :value="statusinv.id" :key="statusinv.id" v-for="statusinv in statusinvs">{{ statusinv.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md" style="text-align: right;">
											<button type="button" class="btn btn-success btn-sm" v-if="typeform === 'edit'" v-on:click="editOdc()">Simpan &nbsp<i class="fas fa-save"></i></button>
											<button type="button" class="btn btn-danger btn-sm" v-on:click="formodcshow = false">Batal &nbsp<i class="fas fa-ban"></i></button>
										</div>
									</div>
								</div>
							<!-- </form> -->
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
				typeform: 'edit',
				formodcshow: false,
				loading: false,
				done: false,
				regionals: [],
				regional: '',
				witels: [],
				witel: '',
				stos: [],
				sto: '',
				id: '',
				odcs: [],
				odc:'',
				odcspecs: [],
				odcspec: '',
				mitras: [],
				mitra: '',
				projek: '',
				typeprojects: [],
				typeproject: '',
				statusconss: [],
				statuscons: '',
				statusinvs: [],
				statusinv: '',
				name: '',
				address: '',
				lokasi: '',
				columns: ['name','odcspec.name', 'project.name', 'mitra.name', 'opsi'],
				small: true,
				options: {
					headings: {
						name: 'Nama',
						'odcspec.name': 'Spesifikasi',
						'project.name': 'Projek',
						'mitra.name': 'Mitra',
						opsi: 'opsi'
					},
					sortable: ['name', 'odcspec.name', 'project.name', 'mitra.name'],
					filterable: ['name', 'odcspec.name', 'project.name', 'mitra.name'],
					pagination: {chunk:10, dropdown: false}
				}
			}
		},
		methods: {
			allRegional() {
				axios.get('/alproodccontentregional')
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
				axios.get('/alproodccontentwitel/'+ this.regional)
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
				axios.get('/alproodccontentsto/'+ this.witel)
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
				if(this.sto == 0){
					alert('STO tidak boleh kosong');

					this.loading = false;
					this.done = false;
				}
				else{
					this.loading = true;
					this.done = false;

					axios.post('/alproodccontentodc', {
						sto: this.sto
					})
					.then(
						response => {
							this.loading = false;
							this.done = true;
							this.odcs = response.data.data
						}
					)
					.catch(
						(error) => console.log(error.message)
					);
				}
			},
			allOdcSpec() {
				axios.get('/alproodccontentodcspec')
				.then(
					response => {
						this.odcspecs = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allTypeProj() {
				axios.get('/alproodccontenttypeproj')
				.then(
					response => {
						this.typeprojects = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allStatusCons() {
				axios.get('/alproodccontentstatuscons')
				.then(
					response => {
						this.statusconss = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allStatusInv() {
				axios.get('/alproodccontentstatusinv')
				.then(
					response => {
						this.statusinvs = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allMitra() {
				axios.get('/alproodccontentmitra')
				.then(
					response => {
						this.mitras = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allMitra() {
				axios.get('/alproodccontentmitra')
				.then(
					response => {
						this.mitras = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
            showOdc(id) {
                axios.get('/alproodccontentodcshow/' + id)
                .then(
                    response => {
                        this.odc = response.data.data
                    }
                )
                .catch(
                    (error) => console.log(error.message)
                )
            }
		},
		mounted() {
			console.log('Component mounted.');
			this.allRegional();
			this.allOdcSpec();
			this.allTypeProj();
			this.allStatusInv();
			this.allStatusCons();
			this.allMitra();
		}
	}
</script>