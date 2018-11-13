<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card text-white bg-info">
						<div class="card-header"><b><i>Instruksi</i></b></div>
						<div class="card-body">
							<li>
								Isi form gpon dengan cermat, mulai dari nama, address, dst.
							</li>
							<li>
	                        	Isi data gpon sesuai urutan, mulai dari regional, witel, sto, dst. Untuk memfilter pencarian data gpon.
	                        </li>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="height: 25px !important"></div>
			<div class="row">
				<div class="col-md-7">
					<div class="card border-primary">
						<div class="card-header"><b><i>Data Gpon</i></b></div>
						<div class="card-body">
							<form>
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
												<option :value="regional.id" v-for="regional in regionals">{{ regional.name }}</option>
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
												<option :value="witel.id" v-for="witel in witels">{{ witel.name }}</option>
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
											<select class="form-control form-control-sm" id="sto" name="sto" v-model="sto" v-on:change="allGpon()">
												<option :value="0">Pilih STO</option>
												<option :value="sto.id" v-for="sto in stos">{{ sto.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md" style="text-align: right;">
											<button type="button" class="btn btn-primary btn-sm">Tampilkan Gpon &nbsp<i class="far fa-arrow-alt-circle-down"></i></button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row table-responsive">
										<div class="col-md">
											<table class="table table-hover table-sm">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama</th>
														<th>Address</th>
														<th>Merk</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card border-danger">
						<div class="card-header"><b><i>Form Gpon</i></b></div>
						<div class="card-body">
							<form @submit.prevent="addGpon">
								<input type="hidden" id="typeform" name="typeform" v-model="typeform">
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="gpon">Nama Gpon</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control form-control-sm" placeholder="Nama Gpon">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="address">Address</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control form-control-sm" placeholder="Address">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="gponmerk">Merk</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<select class="form-control form-control-sm" id="gponmerk" name="gponmerk" v-model="gponmerk" v-on:change="">
												<option :value="0">Pilih Merk</option>
												<option :value="gponmerk.id" v-for="gponmerk in gponmerks">{{ gponmerk.name }}</option>
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
											<select class="form-control form-control-sm" id="mitra" name="mitra" v-model="mitra" v-on:change="">
												<option :value="0">Pilih Mitra</option>
												<option :value="mitra.id" v-for="mitra in mitras">{{ mitra.name }}</option>
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
											<select class="form-control form-control-sm" id="statuscons" name="statuscons" v-model="statuscons" v-on:change="">
												<option :value="0">Pilih Status</option>
												<option :value="statuscons.id" v-for="statuscons in statusconss">{{ statuscons.name }}</option>
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
												<option :value="statusinv.id" v-for="statusinv in statusinvs">{{ statusinv.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="lokasi">Lokasi</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control form-control-sm" placeholder="Lokasi">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md" style="text-align: right;">
											<button type="button" class="btn btn-success btn-sm" v-if="typeform === 'edit'">Simpan &nbsp<i class="fas fa-save"></i></button>
											<button type="button" class="btn btn-primary btn-sm" v-if="typeform === 'add'">Tambah &nbsp<i class="fas fa-plus-circle"></i></button>
											<button type="button" class="btn btn-danger btn-sm">Batal &nbsp<i class="fas fa-ban"></i></button>
										</div>
									</div>
								</div>
								<div class="form-group" v-if="typeform === 'edit'">
									<div class="row">
										<div class="col-md-4">
											<label for="histori">Histori</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control form-control-sm" placeholder="Histori">
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
import axios from 'axios';
	export default{
		data() {
			return {
				typeform: 'add',
				regionals: [],
				regional: '',
				witels: [],
				witel: '',
				stos: [],
				sto: '',
				gponmerks: [],
				gponmerk: '',
				mitras: [],
				mitra: '',
				statusconss: [],
				statuscons: '',
				statusinvs: [],
				statusinv: ''
			}
		},
		methods: {
			allRegional() {
				axios.get('/alprogponcontentregional')
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
				axios.get('/alprogponcontentwitel/'+ this.regional)
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
				axios.get('/alprogponcontentsto/'+ this.witel)
				.then(
					response => {
						this.stos = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allGpon() {

			},
			allGponMerk() {
				axios.get('/alprogponcontentgponmerk')
				.then(
					response => {
						this.gponmerks = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allMitra() {
				axios.get('/alprogponcontentmitra')
				.then(
					response => {
						this.mitras = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allStatusCons() {
				axios.get('/alprogponcontentstatuscons')
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
				axios.get('/alprogponcontentstatusinv')
				.then(
					response => {
						this.statusinvs = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			addGpon() {
				axios.post('')
				.then()
				.catch(
					(error) => console.log(error.message)
				);
			}
		},
		mounted() {
			console.log('Component mounted.');
			this.allRegional();
			this.allGponMerk();
			this.allMitra();
			this.allStatusCons();
			this.allStatusInv();
		}
	}
</script>