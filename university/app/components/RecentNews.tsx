import Image from "next/image"
import Link from "next/link"

const news = [
  {
    title: "New Engineering Lab Launch",
    excerpt: "State-of-the-art facility to boost practical learning for engineering students.",
    image: "/engineering-lab.jpg",
  },
  {
    title: "Alumni Success Stories",
    excerpt: "Recent graduates making waves in their respective industries.",
    image: "/alumni-success.jpg",
  },
  {
    title: "Research Breakthrough in Climate Science",
    excerpt: "University team's findings published in prestigious journal.",
    image: "/climate-research.jpg",
  },
]

const RecentNews = () => {
  return (
    <section className="py-16 bg-gray-100">
      <div className="container mx-auto px-4">
        <h2 className="text-3xl font-bold text-center mb-8">Recent News & Blogs</h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {news.map((item, index) => (
            <div key={index} className="bg-white rounded-lg shadow-md overflow-hidden">
              <Image
                src={item.image || "/placeholder.svg"}
                alt={item.title}
                width={400}
                height={200}
                className="w-full h-48 object-cover"
              />
              <div className="p-6">
                <h3 className="text-xl font-semibold mb-2">{item.title}</h3>
                <p className="text-gray-600 mb-4">{item.excerpt}</p>
                <Link href="#" className="text-blue-600 hover:underline">
                  Read More
                </Link>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}

export default RecentNews

