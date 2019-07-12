# root location
#	/root/customiso/arch/x86_64/squashfs-root/root/install.txt
#	isoinfo -d -i .iso
# Dependencies
#	Host
#	pacman -S squashfs-tools arch-install-scripts cdrtools
#	chroot
#	pacman -S archiso
debug() {
    set -x
    trap read debug
}
build() {
rm /root/customiso/arch/x86_64/squashfs-root/root/host-run.sh
rm /root/customiso/arch/x86_64/squashfs-root/root/guest-run.sh
cp ../out/host-run.sh /root/customiso/arch/x86_64/squashfs-root/root/
cp ../out/guest-run.sh /root/customiso/arch/x86_64/squashfs-root/root/
rm /root/customiso/arch/x86_64/airootfs.sfs
mksquashfs /root/customiso/arch/x86_64/squashfs-root /root/customiso/arch/x86_64/airootfs.sfs
md5sum /root/customiso/arch/x86_64/airootfs.sfs > /root/customiso/arch/x86_64/airootfs.md5
rm ../out/arch-custom.iso
mkdir ../out/"$1"
genisoimage -l -r -J -V "ARCH_201803" -b isolinux/isolinux.bin -no-emul-boot -boot-load-size 4 -boot-info-table -c "isolinux/boot.cat" -o ../out/"$1"/arch-custom.iso /root/customiso
}
build2() {
	echo $1
}
build $1

boot loader.php
<h2>Bootloader</h2>
<label class="container">Grub - is the next generation of the GRand Unified Bootloader.GRUB has been rewritten from scratch to clean up everything and provide modularity and portability
    <input type="radio" name="bootloader" value="grub" checked="checked">
    <span class="radio"></span>
</label>
<label class="container">LILO - The LInux LOader, or LILO for short, is a legacy multi-boot loader for Linux systems
    <input type="radio" name="bootloader" value="lilo">
    <span class="radio"></span>
</label>
<label class="container">Syslinux - is a collection of boot loaders capable of booting from drives, CDs, and over the network via PXE
    <input type="radio" name="bootloader" value="syslinux">
    <span class="radio"></span>
</label>
<label class="container">Systemd - previously called gummiboot, is a simple UEFI boot manager which executes configured EFI images
    <input type="radio" name="bootloader" value="systemd">
    <span class="radio"></span>
</label>
<label class="container">Grub-Legacy - a multiboot bootloader previously maintained by the GNU Project. It was derived from GRUB, the GRand Unified Bootloader, which was originally designed and implemented by Erich Stefan Boleyn
    <input type="radio" name="bootloader" value="grub-legacy">
    <span class="radio"></span>
</label>
