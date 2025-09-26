<!-- Floating Feedback Button -->
<button id="feedbackBtn"
  class="fixed bottom-6 left-6 bg-amber-300 text-neutral-800 shadow-lg 
         hover:bg-amber-400 focus:outline-none rounded-full p-4 z-50 flex items-center justify-center">
  <i class="fa-solid fa-comment-dots text-xl"></i>
</button>

 <!-- Modal Feedback -->
    <div id="feedbackModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6 relative">
            <!-- Tombol Close -->
            <button id="closeModal"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">&times;</button>

            <!-- Header -->
            <h2 class="text-lg font-bold mb-4 text-gray-800">Feedback Form</h2>

            <!-- Form -->
            <form class="space-y-4">
                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-amber-200 focus:outline-none" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-amber-200 focus:outline-none" />
                </div>

                <!-- No. Telepon -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="tel" id="phone" name="phone" placeholder="628xxxx"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-amber-200 focus:outline-none" />
                </div>

                <!-- Isi Feedback -->
                <div>
                    <label for="feedback" class="block text-sm font-medium text-gray-700">Feedback</label>
                    <textarea id="feedback" name="feedback" rows="4" placeholder="Write your feedback..."
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-amber-200 focus:outline-none"></textarea>
                </div>

                <!-- Tombol Submit -->
                <button type="submit"
                    class="w-full bg-amber-300 hover:bg-amber-400 text-neutral-800 font-semibold py-2 px-4 rounded-lg">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const feedbackBtn = document.getElementById("feedbackBtn");
        const feedbackModal = document.getElementById("feedbackModal");
        const closeModal = document.getElementById("closeModal");

        feedbackBtn.addEventListener("click", () => {
            feedbackModal.classList.remove("hidden");
        });

        closeModal.addEventListener("click", () => {
            feedbackModal.classList.add("hidden");
        });

        // close modal kalau klik luar box
        feedbackModal.addEventListener("click", (e) => {
            if (e.target === feedbackModal) {
                feedbackModal.classList.add("hidden");
            }
        });
    });
    </script>