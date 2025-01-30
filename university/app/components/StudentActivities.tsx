"use client"

import { motion } from "framer-motion"
import { Book, Music, ClubIcon as Football, Globe } from "lucide-react"

const activities = [
  {
    icon: Book,
    title: "Academic Clubs",
    description: "Join subject-specific clubs to deepen your knowledge and connect with like-minded peers.",
  },
  {
    icon: Music,
    title: "Arts & Culture",
    description: "Express yourself through various arts and cultural activities, from music to theater.",
  },
  {
    icon: Football,
    title: "Sports & Fitness",
    description: "Stay active and competitive with our wide range of sports teams and fitness programs.",
  },
  {
    icon: Globe,
    title: "Community Service",
    description: "Make a difference in the local community through our volunteer programs and initiatives.",
  },
]

const StudentActivities = () => {
  return (
    <section className="py-12">
      <h2 className="text-3xl font-bold text-center mb-8">Student Activities</h2>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        {activities.map((activity, index) => (
          <motion.div
            key={activity.title}
            className="bg-white rounded-lg shadow-lg p-6 text-center"
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: index * 0.1 }}
          >
            <activity.icon className="w-12 h-12 mx-auto mb-4 text-blue-600" />
            <h3 className="text-xl font-semibold mb-2">{activity.title}</h3>
            <p className="text-gray-600">{activity.description}</p>
          </motion.div>
        ))}
      </div>
    </section>
  )
}

export default StudentActivities

