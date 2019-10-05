<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card text-white bg-info">
						<div class="card-header"><b><i>Instruksi</i></b></div>
						<div class="card-body">
							<li>
	                        	Isi form data projek dengan cermat, karena data projek tidak dapat diubah.
	                        </li>
	                        <li>
	                        	Isi form data projek sesuai urutan, mulai dari regional, witel, sto, dst. Guna meminimalisir kerancuan data.
	                        </li>
	                        <li>
	                        	Ketika projek memerlukan sebuah ODC baru, maka pilih "ODC Baru", kemudian isi nama ODC baru dan spesifikasi dari ODC baru tersebut dengan cermat, dan tekan tombol "Simpan". Kemudian pilih lagi ODC dengan data ODC yang baru ditambahkan tadi. 
	                        </li>
	                        <li>
	                        	Ketika projek memerlukan sebuah distribusi baru, maka pilih "Distribusi Baru", kemudian isi nama distribusi baru dan kapasitas dari distribusi baru tersebut dengan cermat, dan tekan tombol "Simpan". Kemudian pilih lagi distribusi dengan data distribusi yang baru ditambahkan tadi.
	                        </li>
	                        <li>
	                        	Sistem juga memberikan informasi terkait core sisa dari suatu distribusi dan rekomendasi jumlah ODP yang tepat untuk pembangunan di distribusi tersebut.
	                        </li>
	                        <li>
	                        	Ketika semua data projek sudah dipastikan terisi, tekan tombol "Tampilkan Rekomendasi ODP", makan akan muncul daftar nama ODP yang direkomendasikan untuk projek tersebut di box kanan atas dengan judul "Daftar ODP Baru".
	                        </li>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="height: 25px !important"></div>
			<div class="row">
				<div class="col-md-8">
					<div class="card border-primary">
						<div class="card-header"><b><i>Form Data Projek</i></b></div>
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
											<select class="form-control form-control-sm" id="regional" name="regional" v-model="regional" @change="allWitel()">
												<option :value="0">Pilih Regional</option>
												<option :value="regional.id" v-for="regional in regionals" :key="regional.id">{{ regional.name }}</option>
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
												<option :value="witel.id" v-for="witel in witels" :key="witel.id">{{ witel.name }}</option>
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
												<option :value="sto.id" v-for="sto in stos" :key="sto.id">{{ sto.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="nama_projek">Nama Projek</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control form-control-sm" placeholder="Nama projek" id="nama_projek" name="nama_projek" v-model="nama_projek">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="mitra">Mitra Projek</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="mitra" name="mitra" v-model="mitra">
												<option :value="0">Pilih Mitra</option>
												<option :value="mitra.id" v-for="mitra in mitras" :key="mitra.id">{{ mitra.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="tipe_projek">Tipe Projek</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="typeproj" name="typeproj" v-model="typeproj">
												<option :value="0">Pilih Tipe</option>
												<option :value="type.id" v-for="type in types" :key="type.id">{{ type.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="nomor_kontrak">Nomor Kontrak</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control form-control-sm" placeholder="Nomor kontrak" id="contract_number" name="contract_number" v-model="contract_number">
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
											<select class="form-control form-control-sm" id="odc" name="odc" v-model="odc" @change="allDistribution(); rekomendasiOdp();">
												<option :value="0">Pilih ODC</option>
												<option :value="odc.id" v-for="odc in odcs" :key="odc.id">{{ odc.name }}</option>
												<option value="add">Tambah ODC Baru</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group" v-if="odc === 'add'">
									<div class="row">
										<div class="col-md-3">
											<label for="odc_baru">Nama ODC Baru</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control form-control-sm" placeholder="Nama ODC Baru" id="odc_baru" name="odc_baru" v-model="odc_baru" v-on:keyup="rekomendasiOdp()">
										</div>
									</div>
								</div>
								<div class="form-group" v-if="odc === 'add'">
									<div class="row">
										<div class="col-md-3">
											<label for="specofodc">Spesifikasi ODC</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="specofodc" name="specofodc" v-model="specofodc" @change="rekomendasiOdp()">
												<option :value="0">Pilih Spesifikasi</option>
												<option :value="spec.id" v-for="spec in specofodcs" :key="spec.id">{{ spec.name }}</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group" v-if="jumlah_odp != 'tanpaodp'">
									<div class="row">
										<div class="col-md-3">
											<label for="distribution">Distribusi</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="distribution" name="distribution" v-model="distribution" @change="rekomendasiOdp()">
												<option :value="0">Pilih Distribusi</option>
												<option :value="distribution.id" v-for="distribution in distributions" :key="distribution.id">{{ distribution.name }}</option>
												<option value="add">Tambah Distribusi Baru</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group" v-if="distribution === 'add' && jumlah_odp != 'tanpaodp'">
									<div class="row">
										<div class="col-md-3">
											<label for="distribution_baru">Nama Distribusi Baru</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control form-control-sm" placeholder="Nama Distribusi Baru" id="distribution_baru" name="distribution_baru" v-model="distribution_baru" v-on:keyup="rekomendasiOdp()">
										</div>
									</div>
								</div>
								<div class="form-group" v-if="distribution === 'add' && jumlah_odp != 'tanpaodp'">
									<div class="row">
										<div class="col-md-3">
											<label for="capacityofdistribution">Kapasitas Distribusi Baru</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="capacityofdistribution" name="capacityofdistribution" v-model="capacityofdistribution" @change="rekomendasiOdp()">
												<option value="0">Pilih kapasitas</option>
												<option value="12">12</option>
												<option value="24">24</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="tipe_projek"> </label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> </label>
										</div>
										<div class="col-md-8">
											<i><b>Kapasitas : kabel {{ capacityofdistributionforshow }} <br> Core sisa : {{ leftovercoreforshow }} core <br> Rekomendasi jumlah odp : {{ odprecommendationforshow }} ODP</b></i>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<label for="jumlah_odp">Jumlah ODP</label>
										</div>
										<div class="col-md-1" style="text-align: center;">
											<label> : </label>
										</div>
										<div class="col-md-8">
											<select class="form-control form-control-sm" id="jumlah_odp" name="jumlah_odp" v-model="jumlah_odp" @change="cekJumlahOdp()">
												<option v-if="jumlah_odp === 'tanpaodp'" value="denganodp">Dengan Odp</option>
												<option v-for="n in countodprecommendation" :value="n" v-if="jumlah_odp != 'tanpaodp'" :key="n.id">{{ n }}</option>
												<option value="tanpaodp" v-if="odc === 'add'">Tanpa Odp</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md" style="text-align: right;">
											<button type="button" class="btn btn-primary btn-sm" @click="tampilkanRekomendasiOdp()" v-if="jumlah_odp != 'tanpaodp'">Tampilkan Rekomendasi ODP &nbsp<i class="fas fa-arrow-right"></i></button>
											<button type="button" class="btn btn-success btn-sm" @click="saveAndFinish()" v-if="jumlah_odp === 'tanpaodp'">
												Booking ODC &nbsp<i class="fas fa-book"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card border-danger">
						<div class="card-header"><b><i>Daftar ODP Baru</i></b></div>
						<div class="card-body">
							<div class="row">
								<div class="col-md">
									<li :key="row.id" v-for="row in datas"> 
										<span class="badge badge-primary">{{ row.label }}</span>
										<span class="badge badge-primary">{{ row.frame }}</span>
										<span class="badge badge-success">OGP</span>
										<span>&#10003;</span>
									</li>
								</div>
							</div>
							<div class="row" style="height: 40px !important"></div>
							<div class="row">
								<div class="col-md" style="text-align: center;">
									<button class="btn btn-success btn-sm" @click="saveAndFinish()" v-if="this.datas.length > 0">
										Setujui dan simpan &nbsp<i class="fas fa-save"></i>
									</button>
								</div>
							</div>
							<div class="row" v-if="loading">
								<div class="col-md">
									<b><i>Memuat ...</i></b>
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
				jumlah_odp: '',
				nama_projek: '',
				typeproj: '',
				contract_number: '',
				mitras: [],
				mitra: '',
				types: [],
				regionals: [],
				regional: '',
				witels: [],
				witel: '',
				stos: [],
				sto: '',
				odcs: [],
				odc: '',
				odc_baru: '',
				specofodcs: [],
				specofodc: '',
				distributions: [],
				distribution: '',
				capacityofdistribution: '',
				distribution_baru: '',
				capacityofdistributionforshow: '',
				leftovercoreforshow:'',
				odprecommendationforshow: '',
				countodprecommendation: '',
				startodplabel: '',
				datas: [],
				odctext: [],
				distributiontext: '',
				loading: false
			}
		},
		methods: {
			allRegional() {
				axios.get('/bookingcontentregional')
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
				axios.get('/bookingcontentwitel/'+ this.regional)
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
				axios.get('/bookingcontentsto/'+ this.witel)
				.then(
					response => {
						this.stos = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allMitra() {
				axios.get('/bookingcontentmitra')
				.then(
					response => {
						this.mitras = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allTypes() {
				axios.get('/bookingcontenttypeproj')
				.then(
					response => {
						this.types = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allOdc() {
				axios.get('/bookingcontentodc/'+ this.sto)
				.then(
					response => {
						this.odcs = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allSpecOfOdc() {
				axios.get('/bookingcontentodcspec')
				.then(
					response => {
						this.specofodcs = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			allDistribution() {
				axios.get('/bookingcontentdistribution/'+ this.odc)
				.then(
					response => {
						this.distributions = response.data.data
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			cekJumlahOdp() {
				if(this.jumlah_odp == 'tanpaodp') {
					this.distribution = '';
					this.distribution_baru = '';
					this.capacityofdistribution = '';
					this.capacityofdistributionforshow = '-';
					this.leftovercoreforshow = '-';
					this.odprecommendationforshow = '-';
				}
				else if(this.jumlah_odp == 'denganodp') {
					this.jumlah_odp = '';
				} 
			},
			rekomendasiOdp() {
				this.capacityofdistributionforshow = '';
				this.leftovercoreforshow = '';
				this.odprecommendationforshow = '';
				this.countodprecommendation = '';
				this.startodplabel = '';

				if(this.odc == 'add') {
					if(this.distribution == 'add') {
						this.capacityofdistributionforshow = this.capacityofdistribution;
						this.leftovercoreforshow = this.capacityofdistribution;
						this.odprecommendationforshow = (this.capacityofdistribution - (this.capacityofdistribution == 12 ? 2 : 4));
						this.odprecommendationforshow = this.odprecommendationforshow > 0 ? this.odprecommendationforshow : 0;
						this.countodprecommendation = (this.odprecommendationforshow + (this.capacityofdistribution == 12 ? 2 : 4));
					}
					this.startodplabel = 1;
				}
				else {
					axios.get('/bookingcontentodpcountofodc/'+ this.odc)
					.then(
						response => {
							this.startodplabel = (response.data.data.latestlabel + 1)
						}
					)
					.catch(
						(error) => console.log(error.message)
					);

					if(this.distribution == 'add') {
						this.capacityofdistributionforshow = this.capacityofdistribution;
						this.leftovercoreforshow = this.capacityofdistribution;
						this.odprecommendationforshow = (this.capacityofdistribution - (this.capacityofdistribution == 12 ? 2 : 4));
						this.odprecommendationforshow = this.odprecommendationforshow > 0 ? this.odprecommendationforshow : 0;
						this.countodprecommendation = (this.odprecommendationforshow + (this.capacityofdistribution == 12 ? 2 : 4));
					}
					else {
						axios.get('/bookingcontentodpcountofdistribution/'+ this.distribution)
						.then(
							response => {
								this.capacityofdistributionforshow = response.data.data.capacity;
								this.leftovercoreforshow = response.data.data.leftovercores;
								this.odprecommendationforshow = (response.data.data.leftovercores - (response.data.data.capacity == 12 ? 2 : 4));
								this.odprecommendationforshow = this.odprecommendationforshow > 0 ? this.odprecommendationforshow : 0;
								this.countodprecommendation = response.data.data.leftovercores;
							}
						)
						.catch(
							(error) => console.log(error.message)
						);
					}
				}
			},
			tampilkanRekomendasiOdp() {
				var detail = [];	
				var label, frame, index;

				this.odctext = this.odc == 'add' ? this.odc_baru.split('-') : $('#odc option:selected').text().split('-');
				this.distributiontext = this.distribution == 'add' ? this.distribution_baru : $('#distribution option:selected').text().split('-');

				for(var n = 0; n < this.jumlah_odp; n++) {
					index = ('00'+ (this.startodplabel + n));
					index = index.substr(index.length - 3);
					label = 'ODP-'+ this.odctext[1] +'-'+ this.odctext[2] +'/'+ index;
					frame = this.odctext[2] +'/'+ this.distributiontext +'/'+ index +'.01';
					detail[n] = ({ number: index, label: label, frame: frame }); 
				}
				this.datas = detail;
			},
			saveAndFinish() {
				this.loading = true;

				axios.post('/bookingcontentbooking', {
					regional: this.regional,
					witel: this.witel,
					sto: this.sto,
					nama_projek: this.nama_projek,
					mitra: this.mitra,
					tipe_projek: this.typeproj,
					nomor_kontrak: this.contract_number,
					odc: this.odc,
					odc_baru: this.odc_baru,
					spek_odc_baru: this.specofodc,
					distribusi: this.distribution,
					distribusi_baru: this.distribution_baru,
					kap_distribusi_baru: this.capacityofdistribution,
					jumlah_odp: this.jumlah_odp,
					label_odp_awal: this.startodplabel,
					label_odp: JSON.stringify(this.datas)
				})
				.then(
					response => {
						alert('Projek baru telah disimpan');
						this.loading = false;
						this.reset();
					}
				)
				.catch(
					(error) => console.log(error.message)
				);
			},
			reset() {
				Object.assign(this.$data, this.$options.data());
				
				this.allRegional();
				this.allMitra();
				this.allTypes();
				this.allSpecOfOdc();
			}
		},
		mounted() {
			console.log('Component mounted.');
			this.allRegional();
			this.allMitra();
			this.allTypes();
			this.allSpecOfOdc();
		}
	}
</script>