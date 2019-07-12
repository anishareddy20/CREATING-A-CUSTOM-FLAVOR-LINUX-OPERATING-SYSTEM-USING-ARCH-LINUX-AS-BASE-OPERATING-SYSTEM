<?php
$myfile = fopen("../out/host-run.sh", "w") or die("Unable to open file!");
$script="
# Partiton your disks
cfdisk
# Format disk
echo 'Enter dev name'
read dev
mkfs.ext4 \$dev
# Mount filesystem
mount \$dev /mnt
# Install base packages
pacstrap /mnt base
# fstab
genfstab -U /mnt >> /mnt/etc/fstab
# create_bashrc
cp guest-run.sh /mnt/root
cat << EOF >> /mnt/root/.bash_profile
bash guest-run.sh
EOF
# Mount to chroot
arch-chroot /mnt
#	localization";
fwrite($myfile, $script);
?>
Guest installation script.php
<?php
$myfile = fopen("../out/guest-run.sh", "w") or die("Unable to open file!");
$script="
# Timezone
ln -sf ".$_POST['timezone']." /etc/localtime
hwclock --systohc
echo ".$_POST['locale']." > /etc/locale.conf
locale-gen
echo ".$_POST['keyboard']." > /etc/vconsole.conf
echo ".$_POST['hostname']." > /etc/hostname
";
fwrite($myfile, $script);
#	bootloaders
#	Grub
if ($_POST['bootloader'] == "grub") {
$script="grub-install --target=i386-pc \$devupdate-grub";
	fwrite($myfile, $script);
}
#	Syslinux
if ($_POST['bootloader'] == "syslinux") {
	$script="pacman --noconfirm -S syslinux
	mkdir /boot/syslinux
	cp /usr/lib/syslinux/bios/*.c32 /boot/syslinux/     
	extlinux --install /boot/syslinux
	syslinux --directory syslinux --install \$dev
	dd bs=440 count=1 conv=notrunc if=/usr/lib/syslinux/bios/mbr.bin of=/dev/sda
	cat << EOF >> /boot/syslinux/syslinux.cfg
	PROMPT 1
    TIMEOUT 50
 	DEFAULT arch
 	LABEL arch
         LINUX ../vmlinuz-linux
         APPEND root=/dev/sda2 rw
         INITRD ../initramfs-linux.img
 	LABEL archfallback
         LINUX ../vmlinuz-linux
         APPEND root=/dev/sda2 rw
         INITRD ../initramfs-linux-fallback.img
    LABEL windows
         MENU LABEL Windows
         COM32 chain.c32
         APPEND mbr:0xf00f1fd3
	";
	fwrite($myfile, $script);
}
#	Kernel
$script="
pacman --noconfirm -S ".$_POST['kernel'];
fwrite($myfile, $script);
#	Graphics driver
$script="
pacman --noconfirm -S ".$_POST['graphicsdriver'];
fwrite($myfile, $script);
#	Display server
$script="
pacman --noconfirm -S ".$_POST['displayserver'];
fwrite($myfile, $script);
#	Display manager
$script="
pacman --noconfirm -S ".$_POST['displaymanager'];
fwrite($myfile, $script);
if ($_POST['displaymanager'] == 'grub') {
	$script="systemctl enable gdm.service";
	fwrite($myfile, $script);
}
$script="pacman --noconfirm -S \";
fwrite($myfile, $script);
$webbrowsers='';
$bitclients='';
$vpnclients='';
$vncservers='';
$vncclients='';
$webservers='';
$networkmanagers='';
$emailclients='';
$downloadmanagers='';
$script=null;
foreach($_POST['webbrowsers'] as $selected){
$script.=$selected." ";}
foreach($_POST['bitclients'] as $selected){
$script.=$selected." ";}
foreach($_POST['vpnclients'] as $selected){
$script.=$selected." ";}
foreach($_POST['vncservers'] as $selected){
$script.=$selected." ";}
foreach($_POST['vncclients'] as $selected){
$script.=$selected." ";}
foreach($_POST['webservers'] as $selected){
$script.=$selected." ";}
foreach($_POST['networkmanagers'] as $selected){
$script.=$selected." ";}
foreach($_POST['emailclients'] as $selected){
$script.=$selected." ";}
foreach($_POST['downloadmanagers'] as $selected){
$script.=$selected." ";}
fwrite($myfile, $script);
$script=null;
$script="mkinitcpio -p linux";
fwrite($myfile, $script);
?>
