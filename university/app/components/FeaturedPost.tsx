"use client"

import Image from "next/image"
import Link from "next/link"
import { motion } from "framer-motion"

const FeaturedPost = () => {
  return (
    <motion.div
      className="bg-white rounded-xl shadow-lg overflow-hidden mb-12"
      initial={{ opacity: 0, y: 50 }}
      animate={{ opacity: 1, y: 0 }}
      transition={{ duration: 0.5 }}
    >
      <div className="md:flex">
        <div className="md:flex-shrink-0">
          <Image
            className="h-48 w-full object-cover md:w-48"
            src="/featured-post.jpg"
            alt="Featured blog post"
            width={300}
            height={200}
          />
        </div>
        <div className="p-8">
          <div className="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Featured</div>
          <Link
            href="/blog/featured-post"
            className="block mt-1 text-lg leading-tight font-medium text-black hover:underline"
          >
            Introducing Our New State-of-the-Art Research Facility
          </Link>
          <p className="mt-2 text-gray-500">
            We are excited to announce the opening of our cutting-edge research facility, which will revolutionize our
            approach to scientific discovery and innovation...
          </p>
          <div className="mt-4">
            <Link
              href="/blog/featured-post"
              className="text-indigo-500 hover:text-indigo-600 transition duration-300 ease-in-out"
            >
              Read More →
            </Link>
          </div>
        </div>
      </div>
    </motion.div>
  )
}

export default FeaturedPost

