<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card text-white bg-info">
						<div class="card-header"><b><i>Instruksi</i></b></div>
						<div class="card-body">
							<li>
	                        	Isi data gpon sesuai urutan, mulai dari regional, witel, sto, dst. Untuk memfilter pencarian data gpon.
	                        </li>
	                        <li>
								Isi form gpon dengan cermat, mulai dari nama, address, dst.
							</li>
	                        <li>
	                        	Jika ingin menambah gpon baru harus mengisi data gpon terlebih dahulu, kemudian form gpon.
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
							<form @submit.prevent="allGpon">
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
											<button type="submit" class="btn btn-primary btn-sm">Tampilkan Gpon &nbsp<i class="far fa-arrow-alt-circle-down"></i></button>
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
										<v-client-table :columns="columns" :data="gpons" :options="options">
											<span slot="merk" slot-scope="{row}">
												{{row.merk.name}}
											</span>
											<span slot="opsi" slot-scope="{row}">
												<button class="btn btn-secondary btn-sm" v-on:click="formgponshow = true; typeform = 'edit'; showGpon(row.id)">EDIT <i class="fas fa-edit"></i></button>
											</span>
										</v-client-table>		
									</div>
								</div>

								<div class="row">
									<div class="col-md" style="text-align: right;">
										<button type="button" class="btn btn-primary btn-sm" v-on:click="formgponshow = true; typeform = 'add'; reset()">Tambah &nbsp<i class="fas fa-plus-circle"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5" v-show="formgponshow">
					<div class="card border-danger">
						<div class="card-header"><b><i>Form Gpon</i></b></div>
						<div class="card-body">
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
										<input type="text" class="form-control form-control-sm" placeholder="Nama Gpon" name="name" id="name" v-model="name">
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
										<input type="text" class="form-control form-control-sm" placeholder="Address" name="address" id="address" v-model="address">
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
											<option :value="gponmerk.id" :key="gponmerk.id" v-for="gponmerk in gponmerks">{{ gponmerk.name }}</option>
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
									<div class="col-md-4">
										<label for="lokasi">Lokasi</label>
									</div>
									<div class="col-md-1" style="text-align: center;">
										<label> : </label>
									</div>
									<div class="col-md-7">
										<input type="text" class="form-control form-control-sm" placeholder="Lokasi" name="lokasi" id="lokasi" v-model="lokasi">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md" style="text-align: right;">
										<button type="button" class="btn btn-success btn-sm" v-if="typeform === 'edit'" v-on:click="editGpon()">Simpan &nbsp<i class="fas fa-save"></i></button>
										<button type="submit" class="btn btn-primary btn-sm" v-if="typeform === 'add'" v-on:click="addGpon()">Tambah &nbsp<i class="fas fa-plus-circle"></i></button>
										<button type="button" class="btn btn-danger btn-sm" v-on:click="formgponshow = false; reset()">Batal &nbsp<i class="fas fa-ban"></i></button>
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
				formgponshow: false,
				loading: false,
				done: false,
				regionals: [],
				regional: '',
				witels: [],
				witel: '',
				stos: [],
				sto: '',
				id: '',
				gpons: [],
				gpon: '',
				gponmerks: [],
				gponmerk: '',
				mitras: [],
				mitra: '',
				statusconss: [],
				statuscons: '',
				statusinvs: [],
				statusinv: '',
				name: '',
				address: '',
				lokasi: '',
				columns: ['name', 'address', 'merk', 'opsi'],
				small: true,
				options: {
					headings: {
						name: 'Nama',
						address: 'Address',
						merk: 'Merk',
						opsi: 'Opsi'
					},
					sortable: ['name'],
					filterable: ['name', 'address', 'merk'],
					pagination: {chunk:10, dropdown: false}
				}
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
				if(this.sto == 0){
					alert('STO tidak boleh kosong');

					this.loading = false;
					this.done = false;
				}
				else{
					this.loading = true;
					this.done = false;

					axios.post('/alprogponcontentgpon', {
						sto: this.sto
					})
					.then(
						response => {
							this.loading = false;
							this.done = true;
							this.gpons = response.data.data
						}
					)
					.catch(
						(error) => console.log(error.message)
					);
				}
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
				axios.post('/alprogponcontentgponadd', {
					name: this.name,
					address: this.address,
					gponmerk_id: this.gponmerk,
					regional_id: this.regional,
					witel_id: this.witel,
					sto_id: this.sto,
					mitra_id: this.mitra,
					statuscons_id: this.statuscons,
					statusinv_id: this.statusinv,
					lokasi: this.lokasi
				})
				.then(
					response => {
						alert('Gpon baru berhasil ditambah');
						this.allGpon();
						this.reset();
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			reset() {
				this.name = '';
				this.address = '';
				this.gponmerk = '';
				this.mitra = '';
				this.statuscons = '';
				this.statusinv = '';
				this.lokasi = '';

				typeform = 'add';
				formgponshow = false;
				loading = false;
				done = false;
			},
			showGpon(id) {
				axios.get('/alprogponcontentgponshow/'+ id)
				.then(
					response => {
						this.id = response.data.data.id,
						this.name = response.data.data.name,
						this.address = response.data.data.address,
						this.gponmerk = response.data.data.gponmerk_id,
						this.regional = response.data.data.regional_id,
						this.witel = response.data.data.witel_id,
						this.sto = response.data.data.sto_id,
						this.mitra = response.data.data.mitra_id,
						this.statuscons = response.data.data.statuscons_id,
						this.statusinv = response.data.data.statusinv_id,
						this.lokasi = response.data.data.lat +','+ response.data.data.lng
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			editGpon(id) {
				axios.put('/alprogponcontentgponedit/'+ this.id, {
					name: this.name,
					address: this.address,
					gponmerk_id: this.gponmerk,
					regional_id: this.regional,
					witel_id: this.witel,
					sto_id: this.sto,
					mitra_id: this.mitra,
					statuscons_id: this.statuscons,
					statusinv_id: this.statusinv,
					lokasi: this.lokasi
				})
				.then(
					response => {
						alert('Gpon berhasil diubah');
						this.allGpon();
						this.reset();
					}
				)
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