<section>
  <!-- Floating Contact Button -->
  <button class="contact-btn
    fixed bottom-6 right-6 bg-amber-300 hover:bg-amber-400 text-neutral-800 
    shadow-lg rounded-full w-14 h-14 flex items-center justify-center z-50">
    <i class="fas fa-headset text-2xl"></i>
  </button>

  <!-- Chatbot Box -->
  <div id="chatbot-box" 
       class="hidden fixed bottom-24 right-6 w-80 bg-white shadow-xl rounded-xl border border-gray-200 z-50">
    <!-- Header -->
    <div class="bg-amber-300 text-neutral-800 px-4 py-2 rounded-t-xl flex justify-between items-center">
      <span class="font-semibold">Chat Bot</span>
      <button id="close-chat" class="text-lg">&times;</button>
    </div>

    <!-- Chat Content -->
    <div class="p-4 space-y-3 text-sm">
      <p class="text-gray-700">
        👋 Hello, want to join us for a hike?<br>
        Please enter your name & phone number first
      </p>

      <!-- Input Form -->
      <input id="name-input" type="text" placeholder="Name"
             class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-amber-200" />
      <input id="phone-input" type="text" placeholder="Telephone (628xxx)"
             class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-amber-200" />

      <!-- Tombol WA -->
      <a id="wa-link" href="#" target="_blank"
         class="hidden w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg font-semibold text-center block">
        <i class="fab fa-whatsapp mr-2"></i> Contact Us via WhatsApp
      </a>
    </div>
  </div>
</section>


