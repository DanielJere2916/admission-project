"use client"

import { useState } from "react"
import Image from "next/image"
import Link from "next/link"
import { motion } from "framer-motion"

const blogPosts = [
  {
    id: 1,
    title: "Top 10 Study Tips for University Students",
    excerpt: "Maximize your learning potential with these effective study strategies...",
    image: "/study-tips.jpg",
    category: "Academic",
    date: "2023-06-15",
  },
  {
    id: 2,
    title: "Campus Sustainability Initiative Launches",
    excerpt: "Our university takes a big step towards reducing its carbon footprint...",
    image: "/sustainability.jpg",
    category: "Campus Life",
    date: "2023-06-10",
  },
  {
    id: 3,
    title: "Alumni Spotlight: Sarah Johnson, Tech Entrepreneur",
    excerpt: "Learn how our alumna built a successful tech startup after graduation...",
    image: "/alumni-spotlight.jpg",
    category: "Alumni",
    date: "2023-06-05",
  },
  {
    id: 4,
    title: "New Partnership Brings Exciting Research Opportunities",
    excerpt: "Our collaboration with industry leaders opens doors for groundbreaking research...",
    image: "/research-partnership.jpg",
    category: "Research",
    date: "2023-05-30",
  },
  // Add more blog posts as needed
]

const BlogList = () => {
  const [visiblePosts, setVisiblePosts] = useState(3)

  return (
    <div>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {blogPosts.slice(0, visiblePosts).map((post, index) => (
          <motion.div
            key={post.id}
            className="bg-white rounded-xl shadow-md overflow-hidden blog-post-card"
            initial={{ opacity: 0, y: 50 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: index * 0.1 }}
          >
            <Image
              className="h-48 w-full object-cover"
              src={post.image || "/placeholder.svg"}
              alt={post.title}
              width={400}
              height={200}
            />
            <div className="p-6">
              <div className="flex items-center">
                <span className="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                  {post.category}
                </span>
                <span className="text-gray-500 text-sm">{post.date}</span>
              </div>
              <Link
                href={`/blog/${post.id}`}
                className="block mt-2 text-xl font-semibold text-gray-900 hover:text-indigo-600"
              >
                {post.title}
              </Link>
              <p className="mt-3 text-gray-500">{post.excerpt}</p>
              <div className="mt-4">
                <Link
                  href={`/blog/${post.id}`}
                  className="text-indigo-500 hover:text-indigo-600 transition duration-300 ease-in-out"
                >
                  Read More →
                </Link>
              </div>
            </div>
          </motion.div>
        ))}
      </div>
      {visiblePosts < blogPosts.length && (
        <div className="mt-12 text-center">
          <button
            onClick={() => setVisiblePosts((prevVisible) => prevVisible + 3)}
            className="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
          >
            Load More Posts
          </button>
        </div>
      )}
    </div>
  )
}

export default BlogList

