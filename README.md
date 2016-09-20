# An A10K Project: The UX Tool Belt

Every few weeks (days?) a new list of the top UX tools comes out. Without fail,
that list contains the latest software for creating quick mockups or prototypes
and ... little else. Yet the UX designer's repertoire and needs extend far
beyond mockups and prototypes.

The UX Tool Belt attempts to help by cataloging the many tools and techniques
available in a way that's educational and interactive. If you're unfamiliar with
a specific tool or technique, you can click on it to learn more. If you really
want to dive deep into a topic, you can follow the links for more in-depth help.

At the same time, you can add the tools to your own belt and catalog your
process, whether it's your overall process or the tools you use for a specific
project.

## Notes on development

I built this project initially as an entry for [10k Apart](https://a-k-apart.com/).
It's developed with a basic PHP backend pulling the data from a JSON file. I use
a dash of Javascript to enhance the functionality here and there, but it's built
to be fully functional with Javascript disabled.

## Looking to the future

I had a lot of fun building this and I can see a lot of opportunity for
improvement. Here are a couple things I'd love to add in the future:

1. **Save your belt:** Right now, belts are literally stored in the session and are
pretty fragile. Saving would also unlock:
	- Sharing it with others,
	- Editing a belt later, and
	- Owning multiple belts for different projects.
2. **Drag and drop reordering:** Pretty obvious - it'd be nice if I could reorder
the tools to better match my process.
3. **Graphic enhancement:** Each tool should have iconography or graphics that
help explain it visually. (I'm going to do my best to maintain the low initial
weight of the page load, and defer as much as possible to asynchronous loading.)
4. **Ajaxify the belt:** This was originally part of the plan for the A10K entry,
but even the most optimal scripts to do so were getting me really close to the
edge of acceptable.