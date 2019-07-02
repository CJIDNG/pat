<?php

use Illuminate\Database\Seeder;
use App\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Abia information
         $state = new State();
         $state->name = 'Abia';
         $state->longitude = '7.486002487';
         $state->latitude = '5.532003041';
         $state->save();
 
         //Adamawa information
         $state = new State();
         $state->name = 'Adamawa';
         $state->longitude = '13.2700321';
         $state->latitude = '10.2703408';
         $state->save();
 
         //Akwa Ibom information
         $state = new State();
         $state->name = 'Akwa Ibom';
         $state->longitude = '7.849998524';
         $state->latitude = '5.007996056';
         $state->save();
 
         //Anambra information
         $state = new State();
         $state->name = 'Anambra';
         $state->longitude = '7.06999711';
         $state->latitude = '6.210433572';
         $state->save();
 
         //Bauchi information
         $state = new State();
         $state->name = 'Bauchi';
         $state->longitude = '10.19001339';
         $state->latitude = '11.68040977';
         $state->save();

         //Bayelsa information
         $state = new State();
         $state->name = 'Bayelsa';
         $state->longitude = '5.8987';
         $state->latitude = '4.8678';
         $state->save();
 
         //Benue information
         $state = new State();
         $state->name = 'Benue';
         $state->longitude = '8.129984089';
         $state->latitude = '7.190399596';
         $state->save();
 
         //Borno information
         $state = new State();
         $state->name = 'Borno';
         $state->longitude = '12.18999467';
         $state->latitude = '10.62042279';
         $state->save();
 
         //Cross River information
         $state = new State();
         $state->name = 'Cross River';
         $state->longitude = '8.330023558';
         $state->latitude = '4.960406513';
         $state->save();
 
         //Delta information
         $state = new State();
         $state->name = 'Delta';
         $state->longitude = '5.680004434';
         $state->latitude = '5.890427265';
         $state->save();
 
         //Edo information
         $state = new State();
         $state->name = 'Edo';
         $state->longitude = '5.620008096';
         $state->latitude = '6.340477314';
         $state->save();
 
         //Ebonyi information
         $state = new State();
         $state->name = 'Ebonyi';
         $state->longitude = '7.9593';
         $state->latitude = '6.1780';
         $state->save();
 
         //Ekiti information
         $state = new State();
         $state->name = 'Ekiti';
         $state->longitude = '5.219980834';
         $state->latitude = '7.630372741';
         $state->save();
 
         //Enugu information
         $state = new State();
         $state->name = 'Enugu';
         $state->longitude = '7.383362995';
         $state->latitude = '6.867034321';
         $state->save();
 
         //FCT-Abuja information
         $state = new State();
         $state->name = 'FCT- Abuja';
         $state->longitude = '7.533328002';
         $state->latitude = '9.083333149';
         $state->save();
 
         //Gombe information
         $state = new State();
         $state->name = 'Gombe';
         $state->longitude = '11.16995357';
         $state->latitude = '10.29044293';
         $state->save();
 
         //Imo information
         $state = new State();
         $state->name = 'Imo';
         $state->longitude = '7.026003588';
         $state->latitude = '5.492997053';
         $state->save();
 
         //Jigawa information
         $state = new State();
         $state->name = 'Jigawa';
         $state->longitude = '9.350334607';
         $state->latitude = '11.7991891';
         $state->save();
 
         //Kaduna information
         $state = new State();
         $state->name = 'Kaduna';
         $state->longitude = '7.710009724';
         $state->latitude = '11.0799813';
         $state->save();
 
         //Kano information
         $state = new State();
         $state->name = 'Kano';
         $state->longitude = '8.5200378';
         $state->latitude = '11.99997683';
         $state->save();
 
         //Katsina information
         $state = new State();
         $state->name = 'Katsina';
         $state->longitude = '7.320007689';
         $state->latitude = '11.5203937';
         $state->save();
 
         //Kebbi information
         $state = new State();
         $state->name = 'Kebbi';
         $state->longitude = '4.199939737';
         $state->latitude = '12.45041445';
         $state->save();
 
         //Kogi information
         $state = new State();
         $state->name = 'Kogi';
         $state->longitude = '6.739939737';
         $state->latitude = '7.800388203';
         $state->save();
 
         //Kwara information
         $state = new State();
         $state->name = 'Kwara';
         $state->longitude = '4.549995889';
         $state->latitude = '8.490010192';
         $state->save();
 
         //Lagos information
         $state = new State();
         $state->name = 'Lagos';
         $state->longitude = '3.391531071';
         $state->latitude = '6.443261653';
         $state->save();
 
         //Nassarawa information
         $state = new State();
         $state->name = 'Nassarawa';
         $state->longitude = '8.5200378';
         $state->latitude = '8.490423603';
         $state->save();
 
         //Niger information
         $state = new State();
         $state->name = 'Niger';
         $state->longitude = '5.469939737';
         $state->latitude = '10.4003587';
         $state->save();
 
         //Ogun information
         $state = new State();
         $state->name = 'Ogun';
         $state->longitude = '3.350017455';
         $state->latitude = '7.160427265';
         $state->save();
 
         //Ondo information
         $state = new State();
         $state->name = 'Ondo';
         $state->longitude = '5.199982054';
         $state->latitude = '7.250395934';
         $state->save();
 
         //Osun information
         $state = new State();
         $state->name = 'Osun';
         $state->longitude = '4.179992634';
         $state->latitude = '7.629959329';
         $state->save();
 
         //Oyo information
         $state = new State();
         $state->name = 'Oyo';
         $state->longitude = '3.590002806';
         $state->latitude = '7.970016092';
         $state->save();
 
         //Plateau information
         $state = new State();
         $state->name = 'Plateau';
         $state->longitude = '8.890041055';
         $state->latitude = '9.929973978';
         $state->save();
 
         //Rivers information
         $state = new State();
         $state->name = 'Rivers';
         $state->longitude = '7.010000772';
         $state->latitude = '4.810002257';
         $state->save();
 
         //Sokoto information
         $state = new State();
         $state->name = 'Sokoto';
         $state->longitude = '5.240031289';
         $state->latitude = '13.06001548';
         $state->save();
 
         //Taraba information
         $state = new State();
         $state->name = 'Taraba';
         $state->longitude = '9.780012572';
         $state->latitude = '7.870409769';
         $state->save();
 
         //Yobe information
         $state = new State();
         $state->name = 'Yobe';
         $state->longitude = '11.96600457';
         $state->latitude = '11.74899608';
         $state->save();
 
         //Zamfara information
         $state = new State();
         $state->name = 'Zamfara';
         $state->longitude = '6.659996296';
         $state->latitude = '12.1704057';
         $state->save();
    }
}
