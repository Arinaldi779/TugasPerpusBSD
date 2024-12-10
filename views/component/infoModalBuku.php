<!-- You can open the modal using ID.showModal() method -->
<dialog id="detailsBuku" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-lg font-bold"><?php echo $dataBuku['NAMA_BUKU']; ?>!</h3>
        <article>
            <p class="py-4"><?php echo $dataBuku['SINOPSIS']; ?></p>
        </article>
    </div>
    </div>
</dialog>