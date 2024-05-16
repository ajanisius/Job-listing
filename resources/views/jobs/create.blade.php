 <x-layout>
     <x-page-heading>New Job</x-page-heading>
     <x-forms.form method="POST" action='/jobs'>
         <x-forms.input name='title' label='Title' type='text'
             placeholder='PHP Web Developer.....' />
         <x-forms.input name='salary' label='Salary' type='text' placeholder='$ 50.000' />
         <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida" />

         <x-forms.select label="Schedule" name="schedule">
             <option>Part Time</option>
             <option>Full Time</option>
         </x-forms.select>
         <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />
         <x-forms.input name='url' label='URL'
             placeholder='https://acme.com/jobs/ceo-wanted' />
         <div class="inline-flex items-center gap-x-2">
             <span class="w-2 h-2 bg-white inline-block"></span>
             <label class="font-bold" for="description">Description</label>
         </div>
         <textarea class="bg-black/10 border border-white/50 rounded p-3" name="description"
             value='description' id="" cols="70" rows="5"
             placeholder="Tell us About this job"></textarea>
         <x-forms.divider />
         <x-forms.input name='tags' label='Tags (Coma seperated)'
             placeholder='FrontEnd, BackEnd, PHP, React, Java....' />
         <x-forms.button type='submit'>Publish</x-forms.button>
     </x-forms.form>
 </x-layout>
