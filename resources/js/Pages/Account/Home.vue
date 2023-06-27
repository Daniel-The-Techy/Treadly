<template>
    <Headers/>
    <Head title="HomePage"/>

 
     <div class="bg-white ">
      <div class="lg:container mx-auto lg:px-24 py-8">
     
          <div class="px-6">

           <h2 class="text-2xl font-medium text-gray-800">Community Blog</h2>
           <small class="text-gray-500 text-sm font-semibold">Meet new people,post content, gain more followers....</small>
   
      
           <div class="mt-4 relative w-[80%]">
               <ion-icon name="search" class="absolute right-4 md:right-4 xl:right-[36%] top-4 "></ion-icon>
           <input type="text" placeholder="search by category and profession" class="w-full  xl:w-full py-3 rounded-sm px-5 border border-gray-300">
           </div>

          

           

           </div>
 
           <div class="border-t border-gray-200 w-[80%] mt-12">
            <div class="mt-8 w-[200px] ml-6 md:ml-0">
           <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 "></label>
    <select id="countries" class="bg-gray-50 border py-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                 <option default>Filter Post</option>
                 <option>Canada</option>
                 <option>France</option>
                 <option>Germany</option>
</select>
</div>
</div>

 
          <div class="lg:flex flex-cols space-x-16 ">

         

           <div class="mt-10 grid  max-w-2xl grid-col-1 gap-x-8 gap-y-16  lg:max-w-none lg:grid-rows-3">

            
        


             <div class="flex flex-col md:flex-row gap-x-8 bg-white shadow-lg px-8 py-8 ">
             <img src="../../Assets/2011_cowboys_and_aliens-1680x1050.jpg" class="rounded-md w-full md:w-[220px] lg:w-[300px]  h-auto ">
             <article class="flex max-w-xl flex-col  justify-between mt-3">
               <div class="flex items-center gap-x-4 text-xs">
                 <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                 <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</a>
                     <div class="ml-auto">
                       <p class="text-slate-600">2 min ago</p>
                     </div>
               </div>
               <div class="group relative">
                 <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                   <a href="#">
                     <span class="absolute inset-0"></span>
                     Boost your conversion rate
                   </a>
                 </h3>
                 <p class="mt-5 line-clamp-3 leading-6 text-slate-500">
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia fuga dignissimos totam dolorem eligendi doloremque accusantium nam expedita dicta aspernatur possimus, natus, adipisci eum sit reiciendis in, fugit magni culpa sapiente voluptatibus ipsa. Fugit minima perferendis iste adipisci necessitatibus a ut similique, 
                   repellat recusandae perspiciatis rerum exercitationem unde numquam modi eius beatae aspernatur officia
                    accusantium nulla quaerat inventoraccusamus.
                  </p>
            
                  <span class=" text-base text-emerald-500 inline-flex">
                    Read More
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-1">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
</svg>  
                  </span>
                  
               </div>
               <div class="relative mt-8 flex items-center gap-x-4">
                 <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                 <div class="text-sm leading-6">
                   <p class="font-semibold text-gray-900">
                     <a href="#">
                       <span class="absolute inset-0"></span>
                       Michael Foster
                     </a>
                   </p>
                   <p class="text-gray-600">Co-Founder / CTO</p>
                 </div>
               </div>
             </article>



                 



             </div>
         
             
       
             <!-- More posts... -->
 
 
             <div class="flex flex-col md:flex-row lg:flex-row gap-x-8  bg-white shadow-lg px-8 py-8">
                 <img src="../../Assets/2011_cowboys_and_aliens-1680x1050.jpg" class="rounded-md w-full md:w-[300px]  h-auto ">
                 <article class="flex max-w-xl flex-col  justify-between mt-3">
                   <div class="flex  items-center gap-x-4 text-xs">
                     <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                     <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</a>
                   </div>
                   <div class="group relative">
                     <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                       <a href="#">
                         <span class="absolute inset-0"></span>
                         Boost your conversion rate
                       </a>
                     </h3>
                     <p class="mt-5 line-clamp-4 md:line-clamp-3 max-w-prose leading-6 text-slate-500">
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia fuga dignissimos totam dolorem eligendi doloremque accusantium nam expedita dicta aspernatur possimus, natus, adipisci eum sit reiciendis in, fugit magni culpa sapiente voluptatibus ipsa. Fugit minima perferendis iste adipisci necessitatibus a ut similique, 
                       repellat recusandae perspiciatis rerum exercitationem unde numquam modi eius beatae aspernatur officia
                        accusantium nulla quaerat inventoraccusamus.</p>
                   </div>
                   <div class="relative mt-8 flex items-center gap-x-4">
                     <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                     <div class="text-sm leading-6">
                       <p class="font-semibold text-gray-900">
                         <a href="#">
                           <span class="absolute inset-0"></span>
                           Michael Foster
                         </a>
                       </p>
                       <p class="text-gray-600">Co-Founder / CTO</p>
                     </div>
                   </div>
                 </article>
                 </div>

              
                
             
           </div>

           <div class="hidden max-w-6xl  xl:block mt-16">
           
<div class="lg:w-[150%] p-4  bg-white  rounded-lg shadow-md sm:p-8">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900">Top Category</h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200">
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                   
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">
                            Neil Sims
                        </p>
                      
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                      (1)
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                  
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate ">
                            Bonnie Green
                        </p>
                      
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                      (4)
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                  
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate ">
                            Michael Gough
                        </p>
                       
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                        20
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                    
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate ">
                            Lana Byrd
                        </p>
                      
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                        (188)
                    </div>
                </div>
            </li>
            <li class="pt-3 pb-0 sm:pt-4">
                <div class="flex items-center space-x-4">
                   
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate ">
                            Thomes Lean
                        </p>
                      
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                        (799)
                    </div>
                </div>
            </li>
        </ul>
   </div>
</div>



<div class="mt-8">
           
           <div class="w-[150%] p-4  bg-white  rounded-lg shadow-md sm:p-8 ">
               <div class="flex items-center justify-between mb-4">
                   <h5 class="text-xl font-bold leading-none text-gray-900">Top Contributor</h5>
                   <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                       View all
                   </a>
              </div>
              <div class="flow-root">
                   <ul role="list" class="divide-y divide-gray-200">
                       <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                    </div>
                               <div class="flex-1 min-w-0">
                                   <p class="text-sm font-medium text-gray-900 truncate ">
                                       Neil Sims
                                   </p>
                                 
                               </div>
                               <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                 (1)
                               </div>
                           </div>
                       </li>
                       <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                    </div>



                               <div class="flex-1 min-w-0">
                                   <p class="text-sm font-medium text-gray-900 truncate ">
                                       Bonnie Green
                                   </p>
                                 
                               </div>
                               <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                 (4)
                               </div>
                           </div>
                       </li>
                       <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                             
                            <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                    </div>


                               <div class="flex-1 min-w-0">
                                   <p class="text-sm font-medium text-gray-900 truncate ">
                                       Michael Gough
                                   </p>
                                  
                               </div>
                               <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                   20
                               </div>
                           </div>
                       </li>
                       <li class="py-3 sm:py-4">
                           <div class="flex items-center space-x-4">
                               
                            <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                    </div>

                               <div class="flex-1 min-w-0">
                                   <p class="text-sm font-medium text-gray-900 truncate ">
                                       Lana Byrd
                                   </p>
                                 
                               </div>
                               <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                   (188)
                               </div>
                           </div>
                       </li>
                       <li class="pt-3 pb-0 sm:pt-4">
                           <div class="flex items-center space-x-4">
                              
                            <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                    </div>

                               <div class="flex-1 min-w-0">
                                   <p class="text-sm font-medium text-gray-900 truncate ">
                                       Thomes Lean
                                   </p>
                                 
                               </div>
                               <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                   (799)
                               </div>
                           </div>
                       </li>
                   </ul>
              </div>
           </div>
</div>           






           </div>

              
           </div>
        
        
        <div>

        </div>




</div>
   
</div>

    

    <MobileNav/>

  
</template>


<script setup>

import Headers from '@/Components/HomeHeader.vue'
import { Head } from '@inertiajs/vue3';


import MobileNav from '@/Components/MobileNav.vue'

</script>
