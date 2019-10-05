<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card text-white bg-info">
						<div class="card-header"><b><i>Instruksi</i></b></div>
						<div class="card-body">
							<li>
	                        	Isi data distribusi sesuai urutan, mulai dari regional, witel, sto, odc. Untuk memfilter pencarian data distribusi.
	                        </li>
	                        <li>
	                        	Jika ingin menambah informasi sebuah panel yang digunakan disebuah distribusi, cari distribusi tersebut dengan cara seperti instruksi di poin sebelumnya, kemudian pilih panel yang belum terpakai untuk distribusi tersebut.
	                        </li>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="height: 25px !important"></div>
			<div class="row">
				<div class="col-md-7">
					<div class="card border-primary">
						<div class="card-header"><b><i>Data Distribusi</i></b></div>
						<div class="card-body">
							<form @submit.prevent="oneOdc">
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
											<button type="submit" class="btn btn-primary btn-sm">Tampilkan ODC  <i class="far fa-arrow-alt-circle-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<div class="" v-if="loading">
								<label><i>Menunggu ...</i></label>
							</div>
							<form v-if="done" @submit.prevent="addDistribution">
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="distribution_baru">Nama Distribusi Baru</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control form-control-sm" placeholder="Nama Distribusi Baru" id="distribution_baru" name="distribution_baru" v-model="distribution_baru">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="capacityofdistribution">Kap. Distribusi Baru</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="capacityofdistribution" name="capacityofdistribution" v-model="capacityofdistribution">
												<option value="0">Pilih Kapasitas</option>
												<option value="12">12</option>
												<option value="24">24</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md" style="text-align: right;">
											<button type="submit" class="btn btn-primary btn-sm">Tambah Distribusi  <i class="fas fa-plus"></i></button>
										</div>
									</div>
								</div>
							</form>
							<div v-if="done">
								<div class="row">
									<div class="col-md-12">
										<h4 style="width:100%!important"><span style="width:100%" class="badge badge-primary">Data Distribusi</span></h4>
									</div>
								</div>
								<div v-if="datadistributions.length > 0">
									<div class="row">
										<div class="col-md-1">
											No
										</div>
										<div class="col-md-3">
											Nama
										</div>
										<div class="col-md-3">
											Kapasitas
										</div>
										<div class="col-md-5">
											Posisi
										</div>
									</div>
									<div class="row" v-for="(datadist, row) in datadistributions" :key="datadist.id">
										<div class="col-md-1">
											<span class="badge badge-secondary"> {{ (row + 1) }} </span>
										</div>
										<div class="col-md-3">
											<span class="badge badge-secondary"> Distribusi {{ datadist.name }} </span>
										</div>
										<div class="col-md-3">
											<span class="badge badge-secondary"> Kabel {{ datadist.capacity }} </span>
											<span class="badge badge-success" :title="datadist.capacity == 24 ? 'Ubah menjadi kabel 12' : 'Ubah menjadi kabel 24'" @click="changeCapacity(datadist.id ,datadist.capacity)"> <i class="fas fa-edit"></i> </span>
										</div>
										<div class="col-md-5">
											<span v-show="datadist.capacity == 12 && datadist.panel1 == 0 && datadist.panel2 == 0" class="badge badge-secondary"> Belum Terpanel </span>
											<span v-show="datadist.capacity == 12 && datadist.panel1 > 0" class="badge badge-primary"> {{ 'Panel '+ datadist.panel1 }} </span>
											<span v-show="datadist.capacity == 24 && datadist.panel1 == 0 && datadist.panel2 == 0" class="badge badge-secondary"> Belum Terpanel </span> 
											<span v-show="datadist.capacity == 24 && datadist.panel1 > 0 " class="badge badge-primary"> {{ 'Panel '+ datadist.panel1 }} </span>
											<span v-show="datadist.capacity == 24 && datadist.panel2 > 0 " class="badge badge-primary"> {{ 'Panel '+ datadist.panel2 }} </span>
										</div>
									</div>
								</div>
								<div class="row" v-if="datadistributions.length == 0">
									<div class="col-md-12">
										<h4 style="width:100%!important"><span style="width:100%" class="badge badge-secondary">Tidak ada data</span></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5" v-if="done">
					<div class="card border-danger">
						<div class="card-header" style="text-align: center;"><b><i>{{ odcname }}</i></b></div>
						<div class="card-body">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6 offset-md-6 col-sm-12">
										<label> Distribusi </label>
									</div>
								</div>
							</div>
							<div class="form-group" :key="panel.id" v-for="(panel, index) in panels">
								<div class="row">
									<div class="col-md-3">
										<label>{{ panel.index }}</label>
									</div>
									<div class="col-md-1" style="text-align: center;">
										:
									</div>
									<div class="col-md-8">
										<select class="form-control form-control-sm" @change="changeOneDistribution((index + 1), $event)">
											<option>{{ panel.detail != '' ? panel.detail : 'Kosong' }}</option>
											<option :key="distribution.id" v-for="distribution in distributions" :value="distribution.id"> Distribusi ke {{ distribution.distributions }} (Kap: {{ distribution.capacity }}) </option>
											<option v-show="panel.detail != ''" value="0">Kosongkan panel</option>
										</select>
									</div>
								</div>
							</div>
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
				datadistributions: [],
				distributions: [],
				distribution: '',
				distribution_baru: '',
				capacityofdistribution: '',
				panels: [],
				panel: '',
				listdistributionofodc: []
			}
		},
		methods: {
			allRegional() {
				axios.get('/distributioncontentregional')
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
				axios.get('/distributioncontentwitel/'+ this.regional)
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
				axios.get('/distributioncontentsto/'+ this.witel)
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
				axios.get('/distributioncontentodc/'+ this.sto)
				.then(
					response => {
						this.odcs = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			oneOdc() {
				this.loading = true;
				this.done = false;

				axios.post('/distributioncontentoneodc', {
					odc_id: this.odc
				})
				.then(
					response => {
						this.panels = response.data.data.panelofodc;
						this.distributions = response.data.data.distDoesntHavePanel;
						this.datadistributions = response.data.data.alldistributions;
						this.odcname = $('#odc option:selected').text();

						this.loading = false;
						this.done = true;

						console.log(response.data.data);
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			addDistribution() {
				axios.post('/distributioncontentadd', {
					odc_id: this.odc,
					distribution_baru: this.distribution_baru,
					capacityofdistribution: this.capacityofdistribution
				})
				.then(
					response => {
						alert('Distribusi baru telah disimpan');
						this.distribution_baru = '';
						this.capacityofdistribution = '';

						this.oneOdc();
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			changeOneDistribution(panel, event) {
				var answer;

				if(event.target.value == 0) {
					answer = confirm('1. Dengan mengosongkan panel, jika distribusi di panel tersebut ' +
					'berkapasitas 24, maka panel lainnya untuk distribusi tersebut juga akan kosong.\n' +
					'2. Dengan mengosongkan panel, maka ODP di distribusi tersebut otomatis tidak memiliki panel.\n' +
					'Anda yakin ?');
				}
				else {
					answer = confirm('1. Jika panel terisi, pastikan panel tersebut diisi dengan distribusi ' +
					'yang berkapasitas sama antara distribusi sebelumnya dan yang baru.\n' +
					'2. Untuk menghindari redudansi data, sebaiknya kosongkan terlebih dahulu panel yang ingin digunakan, ' +
					'Kemudian isi dengan distribusi yang baru.\n' +
					'3. Usahakan jika distribusi pada panel yang diubah berkapasitas 24, ubah dahulu panel pertama, dan jangan panel kedua.\n' +
					'Anda yakin ingin mengubah distribusi di panel ini ?');
				}
					
				if(answer == true){
					axios.post('/distributioncontentchangeonedistribution', {
						panel: panel,
						distribution_id: event.target.value,
						odc_id: this.odc
					})
					.then(
						response => {
							console.log(response.data.data);
							alert('Perubahan telah disimpan');

							this.oneOdc();
						}
					)
					.catch(
						(error) => console.log(error.message)
					);
				}
			},
			changeCapacity(id, capacity) {
				var partMessage = capacity == 24 ? '12' : '24';

				var answer = confirm('1. Jika anda mengubah kapasitas, maka distribusi tersebut otomatis tidak ' +
				'memiliki panel.\n' +
				'2. Jika anda mengubah kapasitas, maka odp di distribusi tersebut ' +
				'otomatis tidak memiliki distribusi.\n' +
				'Kapasitas sekarang adalah kabel '+ capacity + ', anda akan mengubahnya menjadi kabel '+ partMessage + '.\n' +
				'Anda yakin ingin mengubah kapasitas ?');

				if(answer == true) {
					axios.post('/distributioncontentchangecapacitydistribution', {
						distribution_id: id,
						capacity: capacity == 24 ? '12' : '24'
					})
					.then(
						response => {
							console.log(response.data.data);
							alert('Perubahan telah disimpan');

							this.oneOdc();
						}
					)
					.catch(
						(error) => console.log(error.message)
					);
				}
			}
		},
		mounted() {
			console.log('Component mounted.');
			this.allRegional();
		}
	}
</script>