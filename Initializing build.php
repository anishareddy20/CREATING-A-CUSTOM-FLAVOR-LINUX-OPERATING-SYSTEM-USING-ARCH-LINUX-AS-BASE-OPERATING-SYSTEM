[ -d /root/customiso ] && rm -rf /root/customiso
mkdir /mnt/archiso
mount -t iso9660 -o loop ../iso/arch.iso /mnt/archiso
cp -a /mnt/archiso /root/customiso
unsquashfs -f -d /root/customiso/arch/x86_64/squashfs-root /root/customiso/arch/x86_64/airootfs.sfs 
rm /root/customiso/arch/x86_64/airootfs.sfs
umount /mnt/archiso
cat << "EOF" >> /root/customiso/arch/x86_64/squashfs-root/root/.bash_profile
bash host-run.sh
EOF
