<h2>Graphics driver</h2>
<label class="container">AMD - amdgpu is the open source graphics driver for the latest AMD Radeon graphics cards.
    <input type="radio" name="graphicsdriver" value="xf86-video-amdgpu	xf86-video-ati mesa">
    <span class="radio"></span>
</label>
<label class="container">Intel - Intel provides and supports open source drivers, Intel graphics are essentially plug-and-play.
    <input type="radio" name="graphicsdriver" value="xf86-video-intel mesa">
    <span class="radio"></span>
</label>
<label class="container">Nvidia Open Source
    <input type="radio" name="graphicsdriver" value="xf86-video-nouveau mesa" checked="checked">
    <span class="radio"></span>
</label>
<label class="container">Nvidia (Official)
    <input type="radio" name="graphicsdriver" value="nvidia nvidia-utils">
    <span class="radio"></span>
</label>
